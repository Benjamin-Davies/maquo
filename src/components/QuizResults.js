import { useFocusRef } from '../react-utils.js';

const { createElement: c, useMemo } = React;

function QuizResults({ quizData, answers }) {
  const results = useMemo(() => processResults(quizData, answers));

  const focusRef = useFocusRef();

  return c('div', { className: 'QuizCodePrompt' },
    c('h1', { className: 'QuizCodePrompt__title' },
      'Results',
    ),
    c('div', null, results.score),
    c('div', { className: 'QuizCodePrompt__results Card' },
      c('div', null,
        results.questions.map((question, i) =>
          c(QuizResult, { key: i, question }),
        ),
      ),
    ),
    c('a', { href: '.', className: 'button', ref: focusRef },
      'Go Back Home',
    ),
  );
}

function QuizResult({ question }) {
  return c('div', { className: 'QuizResult' },
    c('h3', null, question.question),
    c('p', null,
      'You put: ',
      c('span', null, question.givenAnswer),
      question.correct
      ? c('span', { className: 'QuizResult__answer--correct' })
      : c('span', { className: 'QuizResult__answer--wrong' }, question.answer),
    ),
  );
}

const compose = (...fs) => x => fs.reduceRight((y, f) => f(y), x);
const zip = (a, b) => a.map((x, i) => [x, b[i]]);

const lowercase = s => s.toLowerCase();
const trimWhitespaceRegex = /^\s*(.+?)\s*$/;
const trimWhitespace = s => (trimWhitespaceRegex.exec(s) ?? [null, ''])[1];
const whitespaceRegex = /\s/g;
const contractWhitespace = s => s.replace(whitespaceRegex, ' ');

const sanitizeAnswer = compose(contractWhitespace, trimWhitespace, lowercase);
const answersEq = (a, b) => sanitizeAnswer(a) === sanitizeAnswer(b);

const processResults = (quizData, givenAnswers) => {
  const questions = zip(quizData.questions, givenAnswers)
    .map(([{ question, answer }, givenAnswer]) => ({
      question,
      answer,
      givenAnswer,
      correct: answersEq(answer, givenAnswer),
    }));

  const total = questions.length;
  const correctCount = questions.filter(q => q.correct).length;

  return {
    questions,
    score: `${correctCount} / ${total}`,
  };
};

export default QuizResults;
