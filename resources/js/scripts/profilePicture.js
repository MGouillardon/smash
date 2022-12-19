$championName = DATA[0].replace("'", '').replace(' ', '').replace('. ', '');

if (championName === 'BelVeth') {
    championName = 'Belveth';
}
if (championName === 'KhaZix') {
    championName = 'Khazix';
}
if (championName === 'Nunu&Willump') {
    championName = 'Nunu';
}

function getChampionImageUrl(championName) {
    return `http://ddragon.leagueoflegends.com/cdn/12.23.1/img/champion/${championName}.png`;
}
