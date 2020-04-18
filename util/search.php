<?php
require_once __DIR__.'/db/quizzes.php';
require_once __DIR__.'/db/users.php';

function rank_quiz($keywords, $quiz) {
    $score = 0;

    foreach ($keywords as $keyword) {
        $score += substr_count(strtolower($quiz['name']), $keyword);
        $score += substr_count(strtolower($quiz['author']), $keyword);
        $score += substr_count(strtolower($quiz['description']), $keyword);
    }

    return $score;
}

function compare_quizzes_by_rank($a, $b) {
    return $b['rank'] - $a['rank'];
}

function search_quizzes($query) {
    $quizzes = get_quizzes();
    $keywords = preg_split('/\s+/', strtolower($query));
    $results = array();

    foreach ($quizzes as $quiz) {
        $quiz['author'] = get_user($quiz['author_id'])['username'];
        $quiz['rank'] = rank_quiz($keywords, $quiz);
        if ($quiz['rank'] > 0) {
            $results[] = $quiz;
        }
    }

    usort($results, 'compare_quizzes_by_rank');

    return $results;
}
