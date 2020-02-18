const { createElement: c, useCallback, useRef } = React;

function QuizCodePrompt() {
  const quizCodeRef = useRef();
  const onSubmit = useCallback(ev => {
    ev.preventDefault();
    location.hash
      = `#${quizCodeRef.current.value}`;
  });

  return c('form', {
    className: 'QuizCodePrompt',
    onSubmit,
  },
    c('h1', { className: 'QuizCodePrompt__title' },
      'Enter your quiz code',
    ),
    c('input', {
      placeholder: 'Quiz Code...',
      ref: quizCodeRef,
      autoFocus: true,
      required: true,
    }),
    c('button', { type: 'submit', },
      'Next',
    ),
  );
}

export default QuizCodePrompt;
