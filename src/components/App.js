import Nav from './Nav.js';
import QuizCodePrompt from './QuizCodePrompt.js';

import { useLocationHash } from '../react-utils.js';

const { createElement: c } = React;

function App() {
  const quizCode = useLocationHash().slice(1);

  return c('div', { className: 'App' },
    c(Nav),
    c('main', {className: 'App__main-content'},
      quizCode
      ? quizCode
      : c(QuizCodePrompt),
    ),
  );
}

export default App;
