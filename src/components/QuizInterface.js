const { createElement: c, useCallback, useState } = React;

function QuizInterface({ quizData, nextStage }) {
  const [questionNumber, setQuestionNumber] = useState(0);
  const question = quizData.questions[questionNumber];

  const [answer, setAnswer] = useState('');
  const answerChanged = useCallback(ev => {
    setAnswer(ev.target.value);
  });

  const [answers, setAnswers] = useState([]);

  const onSubmit = useCallback(ev => {
    ev.preventDefault();

    // It is best practice not to modify state in place
    // So we clone the array
    const newAnswers = answers.slice();
    // And add the user's answer to it
    newAnswers.push(answer);
    setAnswers(newAnswers);

    const nextQuestion = questionNumber + 1;
    if (nextQuestion < quizData.questions.length) {
      // If we have more questions left then view them
      setAnswer('');
      setQuestionNumber(questionNumber + 1);
    } else {
      // Go to the next stage and pass in the answers
      nextStage({ answers: newAnswers });
    }
  }, [questionNumber, quizData, answer]);

  return c('form', {
    className: 'QuizCodePrompt',
    onSubmit,
  },
    c('h1', { className: 'QuizCodePrompt__title' },
      question.question,
    ),
    c('input', {
      placeholder: 'Answer...',
      value: answer,
      onChange: answerChanged,
      autoFocus: true,
      required: true,
    }),
    c('button', { type: 'submit', },
      'Next',
    ),
  );
}

export default QuizInterface;