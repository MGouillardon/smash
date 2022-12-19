import profilePicture from '../composables/profilePicture';

export default function (className, key, name) {
    return `
    
    <h2 class="text-5xl text-center md:text-7xl ${className}">${name}</h2>
    <div class="w-32 h-32 lg:h-64 lg:w-64 flex justify-evenly items-center">
    <a href="/add?${key}">
    <img
    class="w-32 h-32 lg:h-64 lg:w-64"
    src="${profilePicture(key)}"
    alt="${name}"
    />
    </a>
    </div>
    
    `;
}
