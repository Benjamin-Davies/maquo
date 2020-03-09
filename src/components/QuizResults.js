const { createElement: c, useCallback } = React;

function QuizResults({ quizData, answers }) {
    return c('div', { className: 'QuizCodePrompt' },
        c('h1', { className: 'QuizCodePrompt__title' },
            'Results',
        ),
        c('table', null,
            c('tbody', null,
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

    return c('tr', null,
        c('td', null, question.question),
        c('td', null, question.answer),
        c('td', null, answer),
    );
}

export default QuizResults;