const { createElement: c, useCallback } = React;

function QuizPreview({ quizData, nextStage }) {
    const onClick = useCallback(() => {
        nextStage();
    }, [nextStage]);
    return c('div', { className: 'QuizCodePrompt' },
        c('h1', { className: 'QuizCodePrompt__title' },
            quizData.title,
        ),
        c('p', null,
            quizData.description,
        ),
        c('button', { onClick },
            'Take The Quiz',
        ),
    );
}

export default QuizPreview;