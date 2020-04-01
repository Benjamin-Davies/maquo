import { useFetchJson, useLocationHash } from '../../src/react-utils.js';

const { createElement: c, useCallback, useEffect, useState } = React;

function Edit() {
  const quizId = useLocationHash().slice(1);
  const fetchedQuiz = useFetchJson(`../api/quiz?id=${quizId}`);

  const [quiz, setQuiz] = useState(null);
  useEffect(() => {
    if (fetchedQuiz) setQuiz(fetchedQuiz);
  }, [fetchedQuiz]);

  const onChange = useCallback(({ target }) => {
    setQuiz({ ...quiz, [target.name]: target.value });
  }, [quiz]);

  console.log(quiz);

  if (!quiz) {
    return c('h1', { className: 'center' }, 'Loading Quiz...');
  }

  return c(React.Fragment, null,
    c('h1', null, 'Edit Quiz'),
    c('div', { className: 'ColumnForm' },
      c('label', { for: 'name' }, 'Name:'),
      c('input', { id: 'name', value: quiz.name, onChange }),
      c('label', { for: 'description' }, 'Description:'),
      c('input', { id: 'description', value: quiz.description, onChange }),
    ),
  );
}

const root = document.querySelector('#root');
ReactDOM.render(c(Edit), root);
