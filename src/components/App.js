import Nav from './Nav.js';
import QuizInterface from './QuizInterface.js';

import { useLocationHash } from '../react-utils.js';

const { createElement: c, useCallback, useEffect, useState } = React;

function App() {
  const quizCode = useLocationHash().slice(1);
  
  // Redirect to home page if we don't get a quiz code
  useEffect(() => {
    if (!quizCode) {
      location.replace('./');
    }
  }, [quizCode]);

  // Fetch the quiz details
  // TODO: actually do it
  const quizData = {
    title: 'A Quiz',
    description: 'Test your mental skillabilities',
    questions: [
      {
        question: 'One',
        answer: '1',
      },
      {
        question: 'Two',
        answer: '2',
      },
      {
        question: 'Three',
        answer: '3',
      },
    ]
  };

  // Find which stage we are on
  const [currentStage, setCurrentStage] = useState(0);
  const CurrentStage = [
    QuizInterface,
  ][currentStage];

  // The answers once the user has completed the quiz
  const [answers, setAnswers] = useState(null);

  // Switch to the next one
  const nextStage = useCallback(({ answers }) => {
    if (answers) setAnswers(answers);

    setCurrentStage(currentStage + 1);
  }, [currentStage]);

  // Don't fail to badly if we forget and edge case
  if (!CurrentStage) return 'I forgot to finish this';

  return c('div', { className: 'App' },
    c(Nav),
    c('main', {className: 'App__main-content'},
      c(CurrentStage, { quizCode, quizData, answers, nextStage }),
    ),
  );
}

export default App;
