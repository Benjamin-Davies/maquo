import QuizzIdPrompt from './QuizzIdPrompt.js';

const { createElement: c, useEffect, useState } = React;

function getQuizzHash() {
  // Ignore the hash sign
  const quizzId = location.hash.slice(1);
  // All quizzIds must be at least one char long
  if (quizzId.length < 1) {
    return null;
  } else {
    return quizzId;
  }
}

function App() {
  const [quizzId, setQuizzId] =
    useState(getQuizzHash);
  console.log(quizzId)

  useEffect(() => {
    const handler = () =>
      setQuizzId(getQuizzHash());

    window.addEventListener('hashchange', handler);
    return () =>
      window.removeEventListener('hashchange', handler);
  });

  return c('div', { className: 'App' },
    quizzId
    ? quizzId
    : c(QuizzIdPrompt, { onDone: setQuizzId }),
  );
}

export default App;
