const { createElement: c, useCallback, useRef } = React;

function QuizzCodePrompt() {
  const quizzCodeRef = useRef();
  const onSubmit = useCallback(ev => {
    ev.preventDefault();
    location.hash
      = `#${quizzCodeRef.current.value}`;
  });

  return c('form', {
    className: 'QuizzCodePrompt',
    onSubmit,
  },
    c('h1', null, 'Enter your quizz code'),
    c('input', {
      placeholder: 'Quizz Code...',
      ref: quizzCodeRef,
      autoFocus: true,
      required: true,
    }),
    c('button', {
      type: 'submit',
    }, 'Next'),
  );
}

export default QuizzCodePrompt;
