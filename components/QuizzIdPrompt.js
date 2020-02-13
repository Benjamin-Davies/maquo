const { createElement: c, useCallback } = React;

function QuizzIdPrompt({ onDone }) {
  const onSubmit = useCallback(ev => {
    console.log(ev.target);
  }, [onDone]);

  return c('form', {
    className: 'QuizzIdPrompt',
    onSubmit,
  },
    c('input', {
      name: 'quizzId',
      placeholder: 'Quizz Code...',
      autofocus: true,
    }),
  );
}

export default QuizzIdPrompt;
