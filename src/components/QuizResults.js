const { createElement: c } = React;

function QuizResults({ quizData, answers }) {
  return c('div', { className: 'QuizCodePrompt' },
    c('h1', { className: 'QuizCodePrompt__title' },
      'Results',
    ),
    c('div', { className: 'QuizCodePrompt__results Card' },
      c('div', null,
        quizData.questions.map((question, i) =>
          c(QuizResult, { key: i, i, question, answers }),
        ),
      ),
    ),
    c('a', { href: '.', className: 'button' },
      'Go Back Home',
    ),
  );
}

function QuizResult({ i, question, answers }) {
  const answer = answers[i];

  return c('div', { className: 'QuizResult' },
    c('h3', null, question.question),
    c('p', null,
      'You put: ',
      c('span', null, answer),
      answersEq(answer, question.answer)
      ? c('span', { className: 'QuizResult__answer--correct' })
      : c('span', { className: 'QuizResult__answer--wrong' }, question.answer),
    ),
  );
}

const compose = (...fs) => x => fs.reduceRight((y, f) => f(y), x);

const lowercase = s => s.toLowerCase();
const trimWhitespaceRegex = /^\s*(.+?)\s*$/;
const trimWhitespace = s => trimWhitespaceRegex.exec(s)[1];
const whitespaceRegex = /\s/g;
const contractWhitespace = s => s.replace(whitespaceRegex, ' ');

const sanitizeAnswer = compose(contractWhitespace, trimWhitespace, lowercase);
const answersEq = (a, b) => sanitizeAnswer(a) === sanitizeAnswer(b);

export default QuizResults;
