import axios from 'axios';

export const $api = axios.create({
  baseURL: `${process.env.MIX_API_URL}/api/client`,
  headers: {
    Authorization: 'Bearer {token}',
  },
});
