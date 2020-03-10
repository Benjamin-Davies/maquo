const { createElement: c, useCallback } = React;

function QuizResults({ quizData, answers }) {
    return c('div', { className: 'QuizCodePrompt' },
        c('h1', { className: 'QuizCodePrompt__title' },
            'Results',
        ),
        c('div', { className: 'QuizCodePrompt__results' },
            quizData.questions.map((question, i) => 
                c(QuizResult, { key: i, i, question, answers }),
            ),
        ),
        c('a', { href: '.', className: 'button' },
            'Go Back Home',
        ),
    );
}

function QuizResult({ i, question, answers }) {
    const answer = answers[i];

    return c('div', { className: 'QuizResult Card' },
        c('h3', null, question.question),
        c('p', null,
            'You put: ',
            c('span', null, answer),
            answer == question.answer
                ? c('span', { className: 'QuizResult__answer--correct' })
                : c('span', { className: 'QuizResult__answer--wrong' }, question.answer),
        ),
    );
}

export default QuizResults;