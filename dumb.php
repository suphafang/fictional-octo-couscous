<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Binary Star | Homepage</title>
    <meta name="author" content="Codingtime">
    <meta name="description" content="Website for IT KMITL">
    <!-- <meta property="og:image" content=""> -->
    <meta property="og:description" content="IT KMITL Binary Star for freshy2021">
    <meta property="og:title" content="IT Binary Star KMITL">
    <meta name="twitter:title" content="IT Binary Star KMITL">
    <link rel="stylesheet" href="css/tailwind.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Audiowide&display=swap" rel="stylesheet">
</head>

<body class="h-screen overflow-x-hidden">
    <div id='universe' class="w-full h-full bg-white fixed">
        <div id='galaxy'>
            <div class='circle'></div>
            <div class='circle2'></div>
            <div class='circle3'></div>
            <div id='orbit0'>
            <div id='pos0'>
                <div id='dot0'></div>
            </div>
            </div>
            <div id='orbit1'>
            <div id='pos1'>
                <div id='dot1'></div>
            </div>
            </div>
            <div id='orbit2'>
            <div id='pos2'>
                <div id='dot2'></div>
            </div>
            </div>
            <div id='orbit3'>
            <div id='pos3'>
                <div id='dot3'></div>
            </div>
            </div>
        </div>
    </div>
    <div class="hidden modal-guesscard w-full h-full fixed">
        <form class="flex w-full h-full max-w-sm space-x-3 center-pf">
            <div class="w-full max-w-2xl px-5 py-10 m-auto mt-10 bg-white rounded-lg shadow dark:bg-gray-800">
                <div class="mb-6 text-3xl font-light text-center text-gray-800 dark:text-white">
                    ส่งคำใบ้ถึงน้องๆ
                </div>
                <div class="grid max-w-xl grid-cols-2 gap-4 m-auto">
                    <div class="col-span-2">
                        <div class=" relative ">
                            <div class="flex-non w-full h-10">
                                <select class="w-full h-full px-2 bg-white border-2 border-white rounded-md shadow focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" id="btn-pp">
                                    <option value="0">เลือกน้อง</option>
                                    <option value="1">Tiwat</option>
                                    <option value="2">Jeremy</option>
                                    <option value="3">Tanavich</option>
                                    <option value="4">Phufa</option>
                                </select>
                            </div>
                            <!-- <script>
                                function showDropdownOptions() {
                                    document.getElementById("options").classList.toggle("hidden");
                                    document.getElementById("arrow-up").classList.toggle("hidden");
                                    document.getElementById("arrow-down").classList.toggle("hidden");
                                }
                            </script> -->

                        </div>
                    </div>
                    <div class="col-span-2">
                        <div class="col-span-2">
                            <label class="text-gray-700" for="name">
                                <textarea class="flex-1 appearance-none border-2 border-white w-full py-2 px-2 bg-white text-gray-700 placeholder-gray-800 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" id="comment" placeholder="กรอกคำใบ้" name="comment" rows="5" cols="40"></textarea>
                            </label>
                        </div>
                        <div class="col-span-2 text-right space-y-3 mt-2">
                            <button type="submit"
                                class="py-2 px-4  bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                ส่งคำใบ้
                            </button>
                            <button type="cancel"
                                class="py-2 px-4  bg-gray-600 hover:bg-gray-700 focus:ring-indigo-500 focus:ring-offset-indigo-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2  rounded-lg ">
                                ยกเลิก
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
        <div x-data="{ open: false }"
            class="flex flex-col max-w-screen-3xl px-4 mx-auto md:items-center md:justify-between md:flex-row md:px-6 lg:px-24 border-b-2 border-gray-100">
            <div class="p-7 flex flex-row items-center justify-between">
                <a href="index"
                    class="text-2xl font-semibold tracking-widest text-purple-700 uppercase rounded-lg dark-mode:text-white focus:outline-none focus:shadow-outline"
                    style="font-family: 'Audiowide', cursive;">
                    ITBSTAR
                </a>
                <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline" @click="open = !open">
                    <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                        <path x-show="!open" fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                        <path x-show="open" fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <nav :class="{'flex': open, 'hidden': !open}"
                class="text-center flex-col text-center flex-grow pb-4 md:pb-0 hidden md:flex md:justify-end md:flex-row">
                <a href="index" class="hover:text-purple-500 md:hidden">หน้าหลัก</a>
                <a href="dumb" class="hover:text-purple-500 md:hidden">กล่องคำใบ้</a>
                <a href="help" class="hover:text-purple-500 md:hidden">ช่วยเหลือ</a>
                <div class="relative hidden md:flex">
                    <a href="index" class="nava hover:text-purple-500">หน้าหลัก</a>
                    <a href="dumb" class="nava hover:text-purple-500">กล่องคำใบ้</a>
                    <a href="help" class="nava hover:text-purple-500">ช่วยเหลือ</a>
                    <div id="nav-line" class="nav-line absolute bottom-0 left-28"></div>
                    <div id="indicator"></div>
                </div>
                <div class="flex justify-center ml-3">
                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="relative mr-4 z-10 block rounded-md bg-white p-1 focus:outline-none" id="svg-dropdown">
                            <svg class="h-5 w-5 text-gray-800 relative" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" style="margin-top: 0.45rem;"
                                fill="#FCCA2D">
                                <path
                                    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z" />
                            </svg>
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false"
                            class="fixed inset-0 h-full w-full z-10"></div>

                        <div x-show="dropdownOpen"
                            class="absolute positiontext mt-2 bg-white rounded-md shadow-lg overflow-hidden z-20"
                            style="width:20rem;">
                            <div class="py-2">
                                <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                    <img class="h-8 w-8 rounded-full object-cover mx-1"
                                        src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                        alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        <span class="font-bold" href="#">Sara Salah</span> replied on the <span
                                            class="font-bold text-blue-500" href="#">Upload Image</span> artical . 2m
                                    </p>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                    <img class="h-8 w-8 rounded-full object-cover mx-1"
                                        src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
                                        alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        <span class="font-bold" href="#">Slick Net</span> start following you . 45m
                                    </p>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 border-b hover:bg-gray-100 -mx-2">
                                    <img class="h-8 w-8 rounded-full object-cover mx-1"
                                        src="https://images.unsplash.com/photo-1450297350677-623de575f31c?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                                        alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        <span class="font-bold" href="#">Jane Doe</span> Like Your reply on <span
                                            class="font-bold text-blue-500" href="#">Test with TDD</span> artical . 1h
                                    </p>
                                </a>
                                <a href="#" class="flex items-center px-4 py-3 hover:bg-gray-100 -mx-2">
                                    <img class="h-8 w-8 rounded-full object-cover mx-1"
                                        src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=398&q=80"
                                        alt="avatar">
                                    <p class="text-gray-600 text-sm mx-2">
                                        <span class="font-bold" href="#">Abigail Bennett</span> start following you . 3h
                                    </p>
                                </a>
                            </div>
                            <a href="#" class="block bg-gray-800 text-white text-center font-bold py-2">See all
                                notifications</a>
                        </div>
                    </div>
                </div>
                <div @click.away="open = false" class="relative" x-data="{ open: false }">
                    <div>
                        <button @click="open = !open" class="flex flex-row items-center w-full px-4 py-2 mt-2 text-left bg-transparent dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 md:ml-4 hover:text-gray-900 focus:text-white focus:outline-none focus:shadow-outline bg-purple rounded-lg transition duration-500 ease-in-out modal-button">
                            <span class="text-md text-white"><?php echo $_SESSION['authentication']['first_name'].' '.$_SESSION['authentication']['last_name'][0].'.'; ?></span>
                            <svg fill="currentColor" viewBox="0 0 20 20"
                                :class="{'rotate-180': open, 'rotate-0': !open}"
                                class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                                <a class="block px-4 py-2 mt-2 text-md bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="edit">แก้ไขข้อมูลส่วนตัว</a>
                                <a class="block px-4 py-2 mt-2 text-md bg-transparent rounded-lg md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="logout">ออกจากระบบ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- <div class="mb-4 py-2">
            <input class="shadow appearance-none border rounded-xl w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="search" type="text" placeholder="ค้นหา">
        </div> -->
    </div>
    <section id="main-content" class="flex flex-col items-center md:mt-12 kanit w-screen h-4/6">
        
        <!--dumb word-->
        <div class="content-center">
            <div style="font-weight: 500;" class="text-center py-4 text-black text-3xl mt-4 kanit select-none">
                คำใบ้จากพี่ๆ
            </div>
            
        </div>
        <div id="btn-guesscard" class="box-content p-3 border-gray-100 border-2 rounded-lg text-white bg-purple-500 hover:bg-purple-600 transition duration-400 ease-in-out cursor-pointer">
            กรอกคำใบ้
        </div>
        <div class="wraper mt-5 flex flex-col justify-center items-center mx-10 w-full">
            <div class="w-2/3 mb-1 ml-8">
                <div class="text-black">
                    ประวัติคำใบ้
                </div>
            </div>
            <div class="overflow-y-auto h-80 rounded-md w-2/3 space-y-5 p-3">
                <div class="box-content p-4 border-gray-100 border-2 rounded-lg text-purple-500">
                    <!-- ... -->
                    พี่เป็นผู้ชาย <span class="text-gray-400">- 2 ส.ค. 2564</span>
                </div>
                <div class="box-content p-4 border-gray-100 border-2 rounded-lg text-purple-500">
                    <!-- ... -->
                    พี่เป็นผู้ชาย <span class="text-gray-400">- 2 ส.ค. 2564</span>
                </div>
                <div class="box-content p-4 border-gray-100 border-2 rounded-lg text-purple-500">
                    <!-- ... -->
                    พี่เป็นผู้ชาย <span class="text-gray-400">- 2 ส.ค. 2564</span>
                </div>
                <div class="box-content p-4 border-gray-100 border-2 rounded-lg text-purple-500">
                    <!-- ... -->
                    พี่เป็นผู้ชาย <span class="text-gray-400">- 2 ส.ค. 2564</span>
                </div>
                <div class="box-content p-4 border-gray-100 border-2 rounded-lg text-purple-500">
                    <!-- ... -->
                    พี่เป็นผู้ชาย <span class="text-gray-400">- 2 ส.ค. 2564</span>
                </div>
                <div class="box-content p-4 border-gray-100 border-2 rounded-lg text-purple-500">
                    <!-- ... -->
                    พี่เป็นผู้ชาย <span class="text-gray-400">- 2 ส.ค. 2564</span>
                </div>
            </div>
        </div>
        <!-- img -->
        <!-- <div class="warper-svg mt-5 mb-5 flex flex-row justify-center">
            <img class="mx-24" src="img/ladderandbox.svg">
        </div>

        <div class="content-center">
            <div style="-webkit-text-stroke-width: 0.1rem;
            -webkit-text-stroke-color: #7c3aed" class="text-center text-6xl md:text-6xl mt-6">
                <p class="text-transparent dmSans">{{day}} วัน {{hour}} ชั่วโมง {{minite}}นาที</p>
            </div>
        </div> -->
        <!-- footer -->
        <!-- <div class="absolute bottom-0 p-5">
            <div class="content-center">
                <svg class="mx-auto" width="181" height="57" viewBox="0 0 181 57" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.07911 0.512V26H0.0871094V0.512H8.07911ZM31.7047 0.512V6.848H24.9367V26H16.9447V6.848H10.2487V0.512H31.7047ZM57.0535 12.932C58.5895 13.292 59.7775 14.036 60.6175 15.164C61.4815 16.268 61.9135 17.552 61.9135 19.016C61.9135 21.248 61.1695 22.976 59.6815 24.2C58.2175 25.4 56.1055 26 53.3455 26H39.9895V0.512H52.9855C55.5775 0.512 57.6175 1.076 59.1055 2.204C60.5935 3.332 61.3375 4.976 61.3375 7.136C61.3375 8.624 60.9415 9.884 60.1495 10.916C59.3815 11.924 58.3495 12.596 57.0535 12.932ZM47.9815 10.448H51.0775C51.7975 10.448 52.3255 10.304 52.6615 10.016C53.0215 9.728 53.2015 9.284 53.2015 8.684C53.2015 8.06 53.0215 7.604 52.6615 7.316C52.3255 7.004 51.7975 6.848 51.0775 6.848H47.9815V10.448ZM51.6175 19.592C52.3375 19.592 52.8655 19.46 53.2015 19.196C53.5615 18.908 53.7415 18.452 53.7415 17.828C53.7415 16.604 53.0335 15.992 51.6175 15.992H47.9815V19.592H51.6175ZM72.5908 0.512V26H64.5988V0.512H72.5908ZM100.644 26H92.6524L84.1924 13.184V26H76.2004V0.512H84.1924L92.6524 13.544V0.512H100.644V26ZM120.599 22.148H112.103L110.843 26H102.455L111.779 0.512H120.995L130.283 26H121.859L120.599 22.148ZM118.655 16.136L116.351 9.044L114.047 16.136H118.655ZM144.915 26L140.127 16.856H140.091V26H132.099V0.512H143.979C146.043 0.512 147.807 0.883999 149.271 1.628C150.735 2.348 151.827 3.344 152.547 4.616C153.291 5.864 153.663 7.28 153.663 8.864C153.663 10.568 153.183 12.08 152.223 13.4C151.287 14.72 149.931 15.668 148.155 16.244L153.699 26H144.915ZM140.091 11.528H143.259C144.027 11.528 144.603 11.36 144.987 11.024C145.371 10.664 145.563 10.112 145.563 9.368C145.563 8.696 145.359 8.168 144.951 7.784C144.567 7.4 144.003 7.208 143.259 7.208H140.091V11.528ZM180.696 0.512L171.552 18.26V26H163.56V18.26L154.416 0.512H163.56L167.628 9.548L171.696 0.512H180.696ZM52.9497 56.252C49.9017 56.252 47.3817 55.544 45.3897 54.128C43.4217 52.688 42.3537 50.588 42.1857 47.828H50.6817C50.8017 49.292 51.4497 50.024 52.6257 50.024C53.0577 50.024 53.4177 49.928 53.7057 49.736C54.0177 49.52 54.1737 49.196 54.1737 48.764C54.1737 48.164 53.8497 47.684 53.2017 47.324C52.5537 46.94 51.5457 46.508 50.1777 46.028C48.5457 45.452 47.1897 44.888 46.1097 44.336C45.0537 43.784 44.1417 42.98 43.3737 41.924C42.6057 40.868 42.2337 39.512 42.2577 37.856C42.2577 36.2 42.6777 34.796 43.5177 33.644C44.3817 32.468 45.5457 31.58 47.0097 30.98C48.4977 30.38 50.1657 30.08 52.0137 30.08C55.1337 30.08 57.6057 30.8 59.4297 32.24C61.2777 33.68 62.2497 35.708 62.3457 38.324H53.7417C53.7177 37.604 53.5377 37.088 53.2017 36.776C52.8657 36.464 52.4577 36.308 51.9777 36.308C51.6417 36.308 51.3657 36.428 51.1497 36.668C50.9337 36.884 50.8257 37.196 50.8257 37.604C50.8257 38.18 51.1377 38.66 51.7617 39.044C52.4097 39.404 53.4297 39.848 54.8217 40.376C56.4297 40.976 57.7497 41.552 58.7817 42.104C59.8377 42.656 60.7497 43.424 61.5177 44.408C62.2857 45.392 62.6697 46.628 62.6697 48.116C62.6697 49.676 62.2857 51.08 61.5177 52.328C60.7497 53.552 59.6337 54.512 58.1697 55.208C56.7057 55.904 54.9657 56.252 52.9497 56.252ZM85.4937 30.512V36.848H78.7257V56H70.7337V36.848H64.0377V30.512H85.4937ZM104.005 52.148H95.5093L94.2493 56H85.8613L95.1853 30.512H104.401L113.689 56H105.265L104.005 52.148ZM102.061 46.136L99.7573 39.044L97.4533 46.136H102.061ZM128.321 56L123.533 46.856H123.497V56H115.505V30.512H127.385C129.449 30.512 131.213 30.884 132.677 31.628C134.141 32.348 135.233 33.344 135.953 34.616C136.697 35.864 137.069 37.28 137.069 38.864C137.069 40.568 136.589 42.08 135.629 43.4C134.693 44.72 133.337 45.668 131.561 46.244L137.105 56H128.321ZM123.497 41.528H126.665C127.433 41.528 128.009 41.36 128.393 41.024C128.777 40.664 128.969 40.112 128.969 39.368C128.969 38.696 128.765 38.168 128.357 37.784C127.973 37.4 127.409 37.208 126.665 37.208H123.497V41.528Z"
                        fill="url(#paint0_linear)" />
                    <defs>
                        <linearGradient id="paint0_linear" x1="89.5" y1="-2" x2="89.5" y2="56"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#352AFF" />
                            <stop offset="0.711805" stop-color="#7B39FD" />
                            <stop offset="1" stop-color="#A259FF" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
            <div class="content-center">
                <div class="text-center py-4 text-gray-400 text-xs mt-4 text-transparent stroke-current">
                    © 2021 Codingtime. All right reserved
                </div>
            </div>
        </div> -->
        
        
    </section>
    <script>
        document.getElementById('button').onclick = function () {
            document.getElementById("sidebar").classList.toggle("hidden");
        }
        document.getElementById('buttonx').onclick = function () {
            document.getElementById("sidebar").classList.toggle("hidden");
        }
    </script>
</body>
<footer class="text-gray-600 body-font mt-10 w-full mt-20">
    <div class="w-full sm:px-20 py-8 sm:py-2 flex items-center sm:flex-row flex-col">
        <a href="index"
            class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
            <div class="content-center">
                <svg class="mx-auto" width="100" height="57" viewBox="0 0 181 57" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M8.07911 0.512V26H0.0871094V0.512H8.07911ZM31.7047 0.512V6.848H24.9367V26H16.9447V6.848H10.2487V0.512H31.7047ZM57.0535 12.932C58.5895 13.292 59.7775 14.036 60.6175 15.164C61.4815 16.268 61.9135 17.552 61.9135 19.016C61.9135 21.248 61.1695 22.976 59.6815 24.2C58.2175 25.4 56.1055 26 53.3455 26H39.9895V0.512H52.9855C55.5775 0.512 57.6175 1.076 59.1055 2.204C60.5935 3.332 61.3375 4.976 61.3375 7.136C61.3375 8.624 60.9415 9.884 60.1495 10.916C59.3815 11.924 58.3495 12.596 57.0535 12.932ZM47.9815 10.448H51.0775C51.7975 10.448 52.3255 10.304 52.6615 10.016C53.0215 9.728 53.2015 9.284 53.2015 8.684C53.2015 8.06 53.0215 7.604 52.6615 7.316C52.3255 7.004 51.7975 6.848 51.0775 6.848H47.9815V10.448ZM51.6175 19.592C52.3375 19.592 52.8655 19.46 53.2015 19.196C53.5615 18.908 53.7415 18.452 53.7415 17.828C53.7415 16.604 53.0335 15.992 51.6175 15.992H47.9815V19.592H51.6175ZM72.5908 0.512V26H64.5988V0.512H72.5908ZM100.644 26H92.6524L84.1924 13.184V26H76.2004V0.512H84.1924L92.6524 13.544V0.512H100.644V26ZM120.599 22.148H112.103L110.843 26H102.455L111.779 0.512H120.995L130.283 26H121.859L120.599 22.148ZM118.655 16.136L116.351 9.044L114.047 16.136H118.655ZM144.915 26L140.127 16.856H140.091V26H132.099V0.512H143.979C146.043 0.512 147.807 0.883999 149.271 1.628C150.735 2.348 151.827 3.344 152.547 4.616C153.291 5.864 153.663 7.28 153.663 8.864C153.663 10.568 153.183 12.08 152.223 13.4C151.287 14.72 149.931 15.668 148.155 16.244L153.699 26H144.915ZM140.091 11.528H143.259C144.027 11.528 144.603 11.36 144.987 11.024C145.371 10.664 145.563 10.112 145.563 9.368C145.563 8.696 145.359 8.168 144.951 7.784C144.567 7.4 144.003 7.208 143.259 7.208H140.091V11.528ZM180.696 0.512L171.552 18.26V26H163.56V18.26L154.416 0.512H163.56L167.628 9.548L171.696 0.512H180.696ZM52.9497 56.252C49.9017 56.252 47.3817 55.544 45.3897 54.128C43.4217 52.688 42.3537 50.588 42.1857 47.828H50.6817C50.8017 49.292 51.4497 50.024 52.6257 50.024C53.0577 50.024 53.4177 49.928 53.7057 49.736C54.0177 49.52 54.1737 49.196 54.1737 48.764C54.1737 48.164 53.8497 47.684 53.2017 47.324C52.5537 46.94 51.5457 46.508 50.1777 46.028C48.5457 45.452 47.1897 44.888 46.1097 44.336C45.0537 43.784 44.1417 42.98 43.3737 41.924C42.6057 40.868 42.2337 39.512 42.2577 37.856C42.2577 36.2 42.6777 34.796 43.5177 33.644C44.3817 32.468 45.5457 31.58 47.0097 30.98C48.4977 30.38 50.1657 30.08 52.0137 30.08C55.1337 30.08 57.6057 30.8 59.4297 32.24C61.2777 33.68 62.2497 35.708 62.3457 38.324H53.7417C53.7177 37.604 53.5377 37.088 53.2017 36.776C52.8657 36.464 52.4577 36.308 51.9777 36.308C51.6417 36.308 51.3657 36.428 51.1497 36.668C50.9337 36.884 50.8257 37.196 50.8257 37.604C50.8257 38.18 51.1377 38.66 51.7617 39.044C52.4097 39.404 53.4297 39.848 54.8217 40.376C56.4297 40.976 57.7497 41.552 58.7817 42.104C59.8377 42.656 60.7497 43.424 61.5177 44.408C62.2857 45.392 62.6697 46.628 62.6697 48.116C62.6697 49.676 62.2857 51.08 61.5177 52.328C60.7497 53.552 59.6337 54.512 58.1697 55.208C56.7057 55.904 54.9657 56.252 52.9497 56.252ZM85.4937 30.512V36.848H78.7257V56H70.7337V36.848H64.0377V30.512H85.4937ZM104.005 52.148H95.5093L94.2493 56H85.8613L95.1853 30.512H104.401L113.689 56H105.265L104.005 52.148ZM102.061 46.136L99.7573 39.044L97.4533 46.136H102.061ZM128.321 56L123.533 46.856H123.497V56H115.505V30.512H127.385C129.449 30.512 131.213 30.884 132.677 31.628C134.141 32.348 135.233 33.344 135.953 34.616C136.697 35.864 137.069 37.28 137.069 38.864C137.069 40.568 136.589 42.08 135.629 43.4C134.693 44.72 133.337 45.668 131.561 46.244L137.105 56H128.321ZM123.497 41.528H126.665C127.433 41.528 128.009 41.36 128.393 41.024C128.777 40.664 128.969 40.112 128.969 39.368C128.969 38.696 128.765 38.168 128.357 37.784C127.973 37.4 127.409 37.208 126.665 37.208H123.497V41.528Z"
                        fill="url(#paint0_linear)" />
                    <defs>
                        <linearGradient id="paint0_linear" x1="89.5" y1="-2" x2="89.5" y2="56"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#352AFF" />
                            <stop offset="0.711805" stop-color="#7B39FD" />
                            <stop offset="1" stop-color="#A259FF" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </a>
        <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">
            © 2021 All right reserved —
            <a href="https://codingtime.dev/" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">@Codingtime</a>
        </p>
        <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <a class="text-gray-500" href="https://www.facebook.com/ITBinaryStar" target="_blank">
                <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    class="w-5 h-5" viewBox="0 0 24 24">
                    <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
            </a>
        </span>
    </div>
</footer>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script>
        document.querySelector("#btn-guesscard").addEventListener("click", function(){
            // document.querySelector(".modal-guesscard").classList.add("flex");
            $(".modal-guesscard").fadeIn(400);
        })
        $("document").ready(function(){
            $("#universe").fadeOut(700);
        })
        // document.getElementById('button').onclick = function () {
        //     document.getElementById("sidebar").classList.toggle("hidden");
        // }
        // document.getElementById('buttonx').onclick = function () {
        //     document.getElementById("sidebar").classList.toggle("hidden");
        // }
    </script>
<!-- <script src="js/main.js"></script> -->
</html>