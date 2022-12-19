import profilePicture from '../composables/profilePicture';

export default (key, name, className = '') => `
    
    <h2 class="text-5xl text-center md:text-7xl ${className}">${name}</h2>
    <div class="w-32 h-32 2xl:h-64 2xl:w-64 flex justify-evenly items-center">
    <a href="/add?id=${key}">
    <img
    class="w-32 h-32 2xl:h-64 2xl:w-64"
    src="${profilePicture(key)}"
    alt="${name}"
    />
    </a>
    </div>
    
    `;
