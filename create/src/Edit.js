import { useAsync, useLocationHash } from '../../src/react-utils.js';
import { createQuestion, getQuiz, updateQuiz, updateQuestion, deleteQuiz, deleteQuestion } from './api.js';

const { createElement: c, useCallback, useState } = React;

const orderQuestions = (a, b) => a.number - b.number;

function Edit() {
  const quizId = useLocationHash().slice(1);
  const fetchedQuiz = useAsync(() => getQuiz(quizId), [quizId]);

  if (!fetchedQuiz) {
    return c('h1', { className: 'center' }, 'Loading Quiz...');
  }

  return c(React.Fragment, null,
    c('h1', null, 'Edit Quiz'),
    c(EditDetails, { fetchedQuiz }),
    c(EditQuestions, { fetchedQuiz }),
  );
}

function EditDetails({ fetchedQuiz }) {
  const [quiz, setQuiz] = useState(fetchedQuiz);

  const onChange = useCallback(({ target: { id, value } }) => {
    const newQuiz = { ...quiz, [id]: value };
    updateQuiz(newQuiz);
    setQuiz(newQuiz);
  }, [quiz]);

  const onDelete = useCallback(async () => {
    if (confirm('Are you sure that you want to delete this quiz?')) {
      await deleteQuiz(quiz.id);
      location.href = '.';
    }
  });

  return c('section', null,
    c('div', { className: 'ColumnForm' },
      c('p', null,
        c('button', { onClick: onDelete }, 'Delete Quiz'),
      ),
      c('label', { for: 'name' }, 'Name:'),
      c('input', { id: 'name', value: quiz.name, onChange }),
      c('label', { for: 'description' }, 'Description:'),
      c('input', { id: 'description', value: quiz.description, onChange }),
    ),
  );
}

function EditQuestions({ fetchedQuiz }) {
  const [questions, setQuestions] = useState(fetchedQuiz.questions.sort(orderQuestions));

  const onNew = useCallback(async () => {
    const newQuestion = await createQuestion(fetchedQuiz.id);

    const newQuestions = Array.from(questions);
    newQuestions.push(newQuestion);
    newQuestions.sort(orderQuestions);
    setQuestions([...questions, newQuestion]);
  }, [questions]);

  const onChange = useCallback(({ target: { id, value } }) => {
    const [questionId, key] = id.split('.');
    const i = questions.findIndex(q => q.id === questionId);
    const question = questions[i];

    const newQuestion = { ...question, [key]: value };
    updateQuestion(newQuestion);

    const newQuestions = Array.from(questions);
    newQuestions[i] = newQuestion;
    setQuestions(newQuestions);
  }, [questions]);

  const onDelete = useCallback(({ target: { id } }) => {
    const [questionId, _] = id.split('.');
    const i = questions.findIndex(q => q.id === questionId);

    deleteQuestion(id);

    const newQuestions = Array.from(questions);
    newQuestions.splice(i, 1);
    setQuestions(newQuestions);
  }, [questions]);

  return c('section', null,
    c('h3', null, 'Questions'),
    c('p', null,
      c('button', { onClick: onNew }, 'New Question'),
    ),
    questions?.map(question =>
      c(Question, { onChange, onDelete, question }),
    ),
  );
}

function Question({ onChange, onDelete, question: { id, question, answer } }) {
  return c('div', { className: 'Card', key: id },
    c('div', { className: 'ColumnForm' },
      c('label', { for: `${id}.question` }, 'Question'),
      c('input', { id: `${id}.question`, value: question, onChange }),
      c('label', { for: `${id}.answer` }, 'Answer'),
      c('input', { id: `${id}.answer`, value: answer, onChange }),
    ),
    c('div', null,
      c('button', { id: `${id}.delete`, onClick: onDelete }, 'Delete'),
    ),
  );
}

const root = document.querySelector('#root');
ReactDOM.render(c(Edit), root);