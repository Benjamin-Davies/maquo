import QuizzCodePrompt from './QuizzCodePrompt.js';

const { createElement: c, useEffect, useState } = React;

function getQuizzCodeFromHash() {
  // Ignore the hash sign
  const quizzCode = location.hash.slice(1);
  // All quizzIds must be at least one char long
  if (quizzCode.length < 1) {
    return null;
  } else {
    return quizzCode;
  }
}

function App() {
  const [quizzCode, setQuizzCode] =
    useState(getQuizzCodeFromHash);

  useEffect(() => {
    const handler = () =>
      setQuizzCode(getQuizzCodeFromHash());

    window.addEventListener('hashchange', handler);
    return () =>
      window.removeEventListener('hashchange', handler);
  });

  return c('div', { className: 'App' },
    c('main', {className: 'App__main-content'},
      quizzCode
      ? quizzCode
      : c(QuizzCodePrompt),
    ),
  );
}

export default App;
