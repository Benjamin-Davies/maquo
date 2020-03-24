const { createElement: c, useCallback } = React;

function QuizPreview({ quizData, nextStage }) {
  const onClick = useCallback(() => {
    nextStage();
  }, [nextStage]);
  return c('div', { className: 'QuizCodePrompt' },
    c('h1', { className: 'QuizCodePrompt__title' },
      quizData.name ?? 'Loading...',
    ),
    c('h3', { className: 'QuizCodePrompt__title' },
      quizData.author ? `By ${quizData.author}` : null,
    ),
    c('p', null,
      quizData.description,
    ),
    c('button', { onClick, disabled: !quizData.id },
      'Take The Quiz',
    ),
  );
}

export default QuizPreview;
