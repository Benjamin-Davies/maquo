import { useFocusRef } from '../react-utils.js';

const { createElement: c, useCallback, useState } = React;

function QuizInterface({ quizData, nextStage }) {
  const [questionNumber, setQuestionNumber] = useState(0);
  const question = quizData.questions[questionNumber] ?? {};
  if (!question.question) {
    console.log('Shouldn\'t be here!', quizData, questionNumber);
    nextStage();
  }

  const [answer, setAnswer] = useState('');
  const answerChanged = useCallback(ev => {
    setAnswer(ev.target.value);
  });

  const focusRef = useFocusRef([ questionNumber ]);

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
    c('h1', { className: question.question.length > 20
      ? 'QuizCodePrompt__title QuizCodePrompt__title--small'
      : 'QuizCodePrompt__title'
    },
      question.question,
    ),
    c('input', {
      placeholder: 'Answer...',
      value: answer,
      onChange: answerChanged,
      autoFocus: true,
      required: true,
      ref: focusRef,
    }),
    c('button', { type: 'submit', },
      'Next',
    ),
  );
}

export default QuizInterface;
