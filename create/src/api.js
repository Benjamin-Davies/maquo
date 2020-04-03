import { throttleUpdates } from '../../src/throttler.js';

const apiRoot = '../api';

export async function createQuestion(quizId) {
  const res = await fetch(`${apiRoot}/create-question?quiz_id=${quizId}`);
  if (!res.ok) throw 'Could not create question';
  return await res.json();
}

export async function getQuiz(id) {
  const res = await fetch(`${apiRoot}/quiz?id=${id}`);
  if (!res.ok) throw 'Could not get quiz';
  return await res.json();
}

async function updateQuizSimple({ id, name, description }) {
  const body = new FormData();
  body.append('id', id);
  body.append('name', name);
  body.append('description', description);

  const res = await fetch(`${apiRoot}/quiz`, {
    method: 'POST',
    body,
  });
  if (!res.ok) throw 'Could not update quiz';
}

async function updateQuestionSimple({ id, question, answer, number }) {
  const body = new FormData();
  body.append('id', id);
  body.append('question', question);
  body.append('answer', answer);
  body.append('number', number);

  const res = await fetch(`${apiRoot}/question`, {
    method: 'POST',
    body,
  });
  if (!res.ok) throw 'Could not update question';
}

export async function deleteQuiz(id) {
  const body = new FormData();
  body.append('id', id);

  const res = await fetch(`${apiRoot}/delete-quiz`, {
    method: 'POST',
    body,
  });
  if (!res.ok) throw 'Could not delete quiz';
}

export async function deleteQuestion(id) {
  const body = new FormData();
  body.append('id', id);

  const res = await fetch(`${apiRoot}/delete-question`, {
    method: 'POST',
    body,
  });
  if (!res.ok) throw 'Could not delete question';
}

// Throttle the function to:
// a. Prevent the server from being spammed if
//    our connection is slow
// b. Ensures that the requests are always recieved
//    in order. This means that the latest changes
//    will eventually be stored on the server.
export const updateQuiz = throttleUpdates(updateQuizSimple);
export const updateQuestion = throttleUpdates(updateQuestionSimple);
