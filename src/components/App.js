import Nav from './Nav.js';

import { useLocationHash } from '../react-utils.js';

const { createElement: c, useEffect } = React;

function App() {
  const quizCode = useLocationHash().slice(1);
  
  useEffect(() => {
    if (!quizCode) {
      location.replace('./');
    }
  }, [quizCode]);

  return c('div', { className: 'App' },
    c(Nav),
    c('main', {className: 'App__main-content'},
      quizCode
    ),
  );
}

export default App;
