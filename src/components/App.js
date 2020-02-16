import QuizzCodePrompt from './QuizzCodePrompt.js';
import { useLocationHash } from '../react-utils.js';

const { createElement: c } = React;

function App() {
  const quizzCode = useLocationHash().slice(1);

  return c('div', { className: 'App' },
    c('main', {className: 'App__main-content'},
      quizzCode
      ? quizzCode
      : c(QuizzCodePrompt),
    ),
  );
}

export default App;
