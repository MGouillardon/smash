const ADD = '/api/add';
const DUEL = '/api/duel';
const TOP_CHAMPIONS = '/api/results/topChampions';

const TOP_CHAMPIONS_BY_ROLE = role => `/api/results/topRoles?role=${role}`;

export { ADD, DUEL, TOP_CHAMPIONS, TOP_CHAMPIONS_BY_ROLE };
