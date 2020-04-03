import { useAsync, useLocationHash } from '../../src/react-utils.js';
import { getQuiz, updateQuiz, updateQuestion } from './api.js';

const { createElement: c, useCallback, useEffect, useState } = React;

const orderQuestions = (a, b) => a.number - b.number;

function Edit() {
  const quizId = useLocationHash().slice(1);
  const fetchedQuiz = useAsync(() => getQuiz(quizId), [quizId]);

  const [quiz, setQuiz] = useState(null);
  const [questions, setQuestions] = useState(null);
  useEffect(() => {
    if (fetchedQuiz) setQuiz(fetchedQuiz);
    if (fetchedQuiz?.questions)
      setQuestions(fetchedQuiz.questions.sort(orderQuestions));
  }, [fetchedQuiz]);

  const onChange = useCallback(({ target: { id, value } }) => {
    const newQuiz = { ...quiz, [id]: value };
    updateQuiz(newQuiz);
    setQuiz(newQuiz);
  }, [quiz]);

  const onQuestionChange = useCallback(({ target: { id, value } }) => {
    const [questionId, key] = id.split('.');
    const i = questions.findIndex(q => q.id === questionId);
    const question = questions[i];

    const newQuestion = { ...question, [key]: value };
    updateQuestion(newQuestion);

    const newQuestions = Array.from(questions);
    newQuestions[i] = newQuestion;
    setQuestions(newQuestions);
  }, [questions]);

  if (!quiz) {
    return c('h1', { className: 'center' }, 'Loading Quiz...');
  }

  return c(React.Fragment, null,
    c('h1', null, 'Edit Quiz'),
    c('section', null,
      c('div', { className: 'ColumnForm' },
        c('label', { for: 'name' }, 'Name:'),
        c('input', { id: 'name', value: quiz.name, onChange }),
        c('label', { for: 'description' }, 'Description:'),
        c('input', { id: 'description', value: quiz.description, onChange }),
      ),
    ),
    c('section', null,
      questions?.map(question => c(Question, { onChange: onQuestionChange, question })),
    ),
  );
}

function Question({ onChange, question: { id, question, answer } }) {
  return c('div', { className: 'Card', key: id },
    c('div', { className: 'ColumnForm' },
      c('label', { for: `${id}.question` }, 'Question'),
      c('input', { id: `${id}.question`, value: question, onChange }),
      c('label', { for: `${id}.answer` }, 'Answer'),
      c('input', { id: `${id}.answer`, value: answer, onChange }),
    ),
  );
}

const root = document.querySelector('#root');
ReactDOM.render(c(Edit), root);
