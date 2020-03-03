const { createElement: c, useCallback, useState } = React;

function QuizInterface({ quizCode, quizData, nextStage }) {
  const onSubmit = useCallback(ev => {
    ev.preventDefault();
    setQuestionNumber(questionNumber + 1);
  });

  const [questionNumber, setQuestionNumber] = useState(0);
  const currentQuestion = quizData.questions[questionNumber];

  return c('form', {
    className: 'QuizCodePrompt',
    onSubmit,
  },
    c('h1', { className: 'QuizCodePrompt__title' },
      currentQuestion.question,
    ),
    c('input', {
      placeholder: 'Answer...',
      autoFocus: true,
      required: true,
    }),
    c('button', { type: 'submit', },
      'Next',
    ),
  );
}

export default QuizInterface;
