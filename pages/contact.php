<?php
include 'database/config.php';
include 'components/header.php';
?>

<div class="max-w-7xl mx-auto p-4 md:p-8">
      <div class="grid md:grid-cols-2 gap-8 items-start">
        <div class="bg-gray-50 rounded-lg p-6">
          <h2 class="text-3xl font-bold text-indigo-900 mb-4">Get in touch</h2>
          <p class="text-gray-600 mb-8 text-sm">Feel free to contact us and we will get back to you as soon as possible</p>

          <div class="space-y-4">
            <input
              type="text"
              placeholder="Name"
              class="w-full p-3 rounded-lg bg-white border text-sm border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none"
            />
            <input
              type="email"
              placeholder="E-mail"
              class="w-full p-3 rounded-lg bg-white border text-sm border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none"
            />
            <textarea
              placeholder="Message"
              rows={4}
              class="w-full p-3 rounded-lg bg-white border text-sm border-gray-200 focus:border-indigo-500 focus:ring-1 focus:ring-indigo-500 outline-none resize-none"
            ></textarea>
            <button
              type="button"
              class="w-full text-sm bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg transition-colors"
            >
              Send
            </button>
          </div>
        </div>

        <div class="space-y-8">
          <div class="bg-white rounded-lg p-6 shadow">
            <h3 class="text-xl font-semibold text-indigo-900 mb-6">Contact Information</h3>

            <div class="space-y-4">
              <div class="flex items-start space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-indigo-900" viewBox="0 0 64 64">
                  <path d="M32 0A24.032 24.032 0 0 0 8 24c0 17.23 22.36 38.81 23.31 39.72a.99.99 0 0 0 1.38 0C33.64 62.81 56 41.23 56 24A24.032 24.032 0 0 0 32 0zm0 35a11 11 0 1 1 11-11 11.007 11.007 0 0 1-11 11z" data-original="#000000" />
                </svg>
                <div>
                  <h4 class="font-semibold text-gray-900 text-sm mb-1">Our Location</h4>
                  <p class="text-gray-600 text-sm">123 Business Street</p>
                  <p class="text-gray-600 text-sm">New York, NY 10001</p>
                </div>
              </div>

              <div class="flex items-start space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-indigo-900" viewBox="0 0 513.64 513.64">
                  <path d="m499.66 376.96-71.68-71.68c-25.6-25.6-69.12-15.359-79.36 17.92-7.68 23.041-33.28 35.841-56.32 30.72-51.2-12.8-120.32-79.36-133.12-133.12-7.68-23.041 7.68-48.641 30.72-56.32 33.28-10.24 43.52-53.76 17.92-79.36l-71.68-71.68c-20.48-17.92-51.2-17.92-69.12 0L18.38 62.08c-48.64 51.2 5.12 186.88 125.44 307.2s256 176.641 307.2 125.44l48.64-48.64c17.921-20.48 17.921-51.2 0-69.12z" data-original="#000000" />
                </svg>
                <div>
                  <h4 class="font-semibold text-gray-900 text-sm mb-1">Phone Number</h4>
                  <p class="text-gray-600 text-sm">+1 (555) 123-4567</p>
                </div>
              </div>

              <div class="flex items-start space-x-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-indigo-900" viewBox="0 0 512 512">
                  <path d="M298.789 313.693c-12.738 8.492-27.534 12.981-42.789 12.981-15.254 0-30.05-4.489-42.788-12.981L3.409 173.82A76.269 76.269 0 0 1 0 171.403V400.6c0 26.278 21.325 47.133 47.133 47.133h417.733c26.278 0 47.133-21.325 47.133-47.133V171.402a75.21 75.21 0 0 1-3.416 2.422z" data-original="#000000" />
                  <path d="m20.05 148.858 209.803 139.874c7.942 5.295 17.044 7.942 26.146 7.942 9.103 0 18.206-2.648 26.148-7.942L491.95 148.858c12.555-8.365 20.05-22.365 20.05-37.475 0-25.981-21.137-47.117-47.117-47.117H47.117C21.137 64.267 0 85.403 0 111.408a44.912 44.912 0 0 0 20.05 37.45z" data-original="#000000" />
                </svg>
                <div>
                  <h4 class="font-semibold text-gray-900 text-sm mb-1">Email Address</h4>
                  <p class="text-gray-600 text-sm">contact@business.com</p>
                </div>
              </div>
            </div>
          </div>

          <div class="bg-white rounded-lg p-6 shadow">
            <h3 class="text-xl font-semibold text-indigo-900 mb-6">Hours of Operation</h3>
            <div class="space-y-4">
              <div class="flex justify-between">
                <span class="text-gray-600 text-sm">Monday - Friday</span>
                <span class="text-gray-800 text-sm">9:00 AM - 6:00 PM</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600 text-sm">Saturday</span>
                <span class="text-gray-800 text-sm">10:00 AM - 4:00 PM</span>
              </div>
              <div class="flex justify-between">
                <span class="text-gray-600 text-sm">Sunday</span>
                <span class="text-gray-800 text-sm">Closed</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php
include 'components/footer.php';
?>