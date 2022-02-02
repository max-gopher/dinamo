import { $api } from '@/js/axios';

export const getTeam = async () => {
  const response = await $api.get('/team');

  return response;
};

export const getArticles = async () => {
  const response = await $api.get('/articles');

  return response;
};

export const getArticle = async ({ id }) => {
  const response = await $api.get(`/article/${id}`);

  return response;
};

export const getTable = async (payload) => {
  const response = await $api.post('/table', payload);

  return response;
};

export const getGames = async (payload) => {
  const response = await $api.post('/games', payload);

  return response;
};

export const getGame = async (payload) => {
  const response = await $api.post('/game', payload);

  return response;
};
