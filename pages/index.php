<?php
include 'database/config.php';
include 'components/header.php';
?>


<div class="relative font-sans before:absolute before:w-full before:h-full before:inset-0 before:bg-black before:opacity-50 before:z-10 p-8"p-8>
      <img src="https://static.vecteezy.com/system/resources/previews/005/004/846/large_2x/abstract-sound-wave-curve-background-illustration-with-gold-and-blue-particles-creative-colorful-equalizer-and-spectrum-music-for-banner-and-poster-vector.jpg" alt="Banner Image" class="absolute inset-0 w-full h-full object-cover" />

      <div class="min-h-[350px] relative z-50 h-full max-w-6xl mx-auto flex flex-col justify-center items-center text-center text-white p-6">
        <h2 class="sm:text-4xl text-2xl font-bold mb-6">Explore The World Of Music</h2>
        <p class="sm:text-lg text-base text-center text-gray-200">Discover Music!</p>

        <button
          type="button"
          class="mt-10 bg-transparent text-white text-base py-3 px-6 border border-white rounded-lg hover:bg-white hover:text-black transition duration-300">
          Start Now!
        </button>
      </div>
    </div>

<?php
include 'components/footer.php';
?>