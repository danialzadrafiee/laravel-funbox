<x-layout>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <style>
        html,
        body {
            overflow: hidden;
            height: 100%;
        }

        map {
            background: url("{{ asset('game/map.webp') }}");
            background-size: cover;
            background-repeat: no-repeat;
        }

        .house {
            position: absolute;
            cursor: pointer;
        }

        .select_item.active {
            outline: 3px;
            outline: 3px solid #db615e;
            outline-offset: -2px;
            background: #eefbff;
        }

        .nav-link {
            opacity: 0.6;
        }

        .nav-link.active {
            opacity: 1;
            font-weight: 600;
        }

        .tabs {
            display: none;
        }

        .tabs.active {
            display: block;
        }
    </style>


    <modal data-id="h1" class="w-screen h-screen fixed hidden inset-0 z-[500] mt-auto bg-black/90">
        <data class="absolute flex flex-col gap-3 m-auto inset-0 h-max  w-max p-6 rounded-xl bg-white">
            <nav class="flex gap-6 ">

                <subject class="font-semibold">
                    build your house
                </subject>

                <div class="ml-auto"></div>
                <nav-link data-tab="bedroom" class="nav-link cursor-pointer  active text-[#db615e]">Bedroom</nav-link>
                <nav-link data-tab="hall" class="nav-link  cursor-pointer text-[#db615e]">Hall</nav-link>
                <nav-link data-tab="kitchen" class="nav-link__disable opacity-60  cursor-default   text-[#db615e]">
                    Kitchen
                </nav-link>
            </nav>

            {{-- tab bedrrom --}}
            <tab data-tab='bedroom' class="tabs active">
                <inside class="flex justify-between gap-3">
                    <selector class="flex flex-col gap-3">
                        <item data-id="hb1"
                            class="select_item cursor-pointer active w-[100px] h-[100px] rounded-[14px] p-2 bg-[#D9D9D9] flex items-center justify-center">
                            <img src="{{ asset('game/hb1.png') }}" class="">
                        </item>
                        <item data-id="hb2"
                            class="select_item cursor-pointer w-[100px] h-[100px] rounded-[14px] p-2 bg-[#D9D9D9] flex items-center justify-center">
                            <img src="{{ asset('game/hb2.png') }}" class="">

                        </item>
                        <item
                            class="select_item_lock  w-[100px] cursor-not-allowed h-[100px] rounded-[14px]  p-2 bg-[#f0f0f0] flex items-center justify-center">
                            <img src="{{ asset('game/lock.avif') }}">
                        </item>
                        <item
                            class="select_item_lock  w-[100px]  cursor-not-allowed h-[100px] rounded-[14px]  p-2 bg-[#D9D9D9] flex items-center justify-center">
                            <img src="{{ asset('game/lock.avif') }}">
                        </item>
                        <item
                            class="select_item_lock  w-[100px]  cursor-not-allowed h-[100px] rounded-[14px]  p-2 bg-[#D9D9D9] flex items-center justify-center">
                            <img src="{{ asset('game/lock.avif') }}">
                        </item>
                    </selector>
                    <preview class=" w-[548px] h-[548px] block bg-[#D9D9D9] rounded-[14px]">
                        <img src="{{ asset('game/hb1.png') }}" class="preview_image">
                    </preview>
                </inside>
            </tab>

            {{-- tab hall --}}
            <tab data-tab='hall' class="tabs">
                <inside class="flex justify-between gap-3">
                    <selector class="flex flex-col gap-3">
                        <item data-id="hh1"
                            class="select_item cursor-pointer active w-[100px] h-[100px] rounded-[14px] p-2 bg-[#D9D9D9] flex items-center justify-center">
                            <img src="{{ asset('game/hh1.png') }}" class="">
                        </item>

                        <item
                            class="select_item_lock  w-[100px] cursor-not-allowed h-[100px] rounded-[14px]  p-2 bg-[#f0f0f0] flex items-center justify-center">
                            <img src="{{ asset('game/lock.avif') }}">
                        </item>
                        <item
                            class="select_item_lock  w-[100px] cursor-not-allowed h-[100px] rounded-[14px]  p-2 bg-[#f0f0f0] flex items-center justify-center">
                            <img src="{{ asset('game/lock.avif') }}">
                        </item>
                        <item
                            class="select_item_lock  w-[100px] cursor-not-allowed h-[100px] rounded-[14px]  p-2 bg-[#f0f0f0] flex items-center justify-center">
                            <img src="{{ asset('game/lock.avif') }}">
                        </item>
                        <item
                            class="select_item_lock  w-[100px]  cursor-not-allowed h-[100px] rounded-[14px]  p-2 bg-[#D9D9D9] flex items-center justify-center">
                            <img src="{{ asset('game/lock.avif') }}">
                        </item>
                    </selector>
                    <preview class=" w-[548px] h-[548px] block bg-[#D9D9D9] rounded-[14px]">
                        <img src="{{ asset('game/hh1.png') }}" class="preview_image">
                    </preview>
                </inside>
            </tab>
            <nav class="flex justify-end w-full
                            items-center">
                <actions class="flex items-center  gap-3">
                    <modal_close data-id="h1"
                        class="text-[#db615e] cursor-pointer flex items-center rounded-[9px] h-[34px] ">
                        Cancel
                    </modal_close>
                    <input type="hidden" class="route_auth_update" value="{{ route('auth.update') }}">
                    <modal_submit
                        class="bg-[#db615e] cursor-pointer rounded-[9px] px-4 flex items-center justify-center  h-[34px] text-white  ">
                        Save changes
                    </modal_submit>
                </actions>
            </nav>
        </data>
    </modal>


    <modal class="modal_hall  hidden w-screen h-screen inset-0  mx-auto bg-black fixed z-50 ">
        <div
            class="modal_hall_close fixed font-semibold bg-white top-6 cursor-pointer right-6 flex rounded-lg px-4 py-1">
            close
        </div>
        <img src="{{ asset('game/hh1.png') }}" class="modal_hall_tv h-screen cursor-pointer w-auto mx-auto p-24">
    </modal>

    <modal class="modal_video   w-screen h-screen fixed hidden  inset-0 z-[500] mt-auto bg-black">
        <inside
            class="absolute w-max h-max flex  gap-4 m-auto inset-0 p-6 rounded-3xl @[1400px]:scale-105  @[1500px]:scale-110 @[1600px]:scale-125 @[1800px]:scale-[1.3] bg-[#070710]">
            <div class="absolute  right-4 bottom-2 cursor-pointer  flex z-50 rounded-lg p-2">
                <div class="rounded-full text-[#c6181e]/80 hover:text-[#c6181e]  text-sm font-bold modal_video_close">
                    close </div>
            </div>
            <nav class="gap-4 w-max flex flex-col shrink-0">
                <header class="w-[308px] h-[54px] flex items-center px-2  gap-2 rounded-[9px] bg-[#15161c]">
                    <item
                        class="h-[38px] cursor-pointer rounded-md flex-1 bg-[#c6181e] text-white flex items-center justify-center">
                        TV Series
                    </item>
                    <item
                        class="h-[38px]  cursor-pointer rounded-md flex-1 text-white flex items-center justify-center">
                        Film
                    </item>
                </header>
                <filter class="flex justify-between items-center">
                    <span class="text-[#a92228] font-semibold">Show filter</span>
                    <action class="flex  gap-2">
                        <icon class="fill-[#3a393e] block w-[18px] h-[18px]">
                            <svg width="18" height="17" viewBox="0 0 18 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect width="18" height="8" rx="4" fill="#C4181C" />
                                <rect y="9" width="18" height="8" rx="4" fill="#C4181C" />
                            </svg>
                        </icon>
                        <icon class="fill-[#c4181c] block ">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect y="9" width="8" height="8" rx="2" fill="#3A393E" />
                                <rect width="8" height="8" rx="2" fill="#3A393E" />
                                <rect x="9" width="8" height="8" rx="2" fill="#3A393E" />
                                <rect x="9" y="9" width="8" height="8" rx="2"
                                    fill="#3A393E" />
                            </svg>
                        </icon>
                    </action>
                </filter>
                <movies class="flex flex-col gap-4">
                    @php
                        $names = ['Wensday', 'Peaky Bilders', 'Breaking Bad'];
                    @endphp
                    @foreach ($names as $name)
                        <movie class="flex gap-4 items-center ">
                            <img src="{{ asset('image/m' . $loop->index . '.jpg') }}"
                                class="w-[130px] h-[150px] rounded-[18px]">
                            <describe class="flex flex-col gap-2 w-full pr-4 justify-between ">
                                <name class="text-white font-semibold">{{ $name }}</name>
                                <imdb>
                                    <icon class="flex gap-2 items-center justify-between">
                                        <img src="{{ asset('game/imdb.svg') }}" class="w-[48px] h-[24px]">
                                        <span class="text-white text-sm">8.2/10 (140k)</span>
                                    </icon>
                                </imdb>
                                <genre class="text-sm text-white opacity-40 font-light">Action . Adventure</genre>
                                <label
                                    class="bg-[#211f27] text-white rounded-full gap-1 w-full h-[24px] flex items-center text-xs px-[8px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                        class="w-[12px] h-[12px] fill-white">
                                        <path
                                            d="M0 96C0 60.7 28.7 32 64 32H196.1c19.1 0 37.4 7.6 50.9 21.1L289.9 96H448c35.3 0 64 28.7 64 64V416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96zM64 80c-8.8 0-16 7.2-16 16V416c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V160c0-8.8-7.2-16-16-16H286.6c-10.6 0-20.8-4.2-28.3-11.7L213.1 87c-4.5-4.5-10.6-7-17-7H64z" />
                                    </svg>
                                    <span class="block">
                                        2 season | 9 Episodes
                                    </span>
                                </label>
                                <director class="flex font-light items-center gap-2  text-sm">
                                    <span class="text-white">
                                        Director :
                                    </span>
                                    <span class="text-[#c4181c]">
                                        Shawn Levy
                                    </span>
                                </director>
                            </describe>
                        </movie>
                    @endforeach

                </movies>
            </nav>
            <content class="flex w-[748px] gap-4 flex-col">
                <player class="text-white w-[748px] h-[420px] bg-[#12121a] rounded-[16px] relative shrink-0 player">

                    <video id="player" playsinline controls class=" w-[748px] h-[420px] z-[60] object-cover rounded-[16px absolute"  style="display:none;">
                        <source
                            src="https://file-examples.com/storage/fef89aabc36429826928b9c/2017/04/file_example_MP4_480_1_5MG.mp4"
                            type="video/mp4">
                    </video>

                   



                    <div class="botón absolute inset-0 m-auto z-20 scale-50"
                        onclick="this.classList.toggle('active')">
                        <div class="fondo" x="0" y="0" width="200" height="200"></div>
                        <div class="icono" width="200" height="200">
                            <div class="parte izquierda" x="0" y="0" width="200"
                                height="200" fill="#fff"></div>
                            <div class="parte derecha" x="0" y="0" width="200" height="200"
                                fill="#fff"></div>
                        </div>
                        <div class="puntero"></div>
                    </div>

                    <img src="{{ asset('game/player.webp') }}"
                        class=" w-[748px] h-[420px] object-cover rounded-[16px] brightness-75">
                </player>
                <row class="flex justify-between items-center">
                    <name class="text-white font-bold">
                        25 VS Code Productivity Tips and Speed Hacks
                    </name>
                    <likes class="w-[90px] bg-[#272727] text-white/70 flex justify-between p-2 rounded-full">
                        <like
                            class="flex gap-1 cursor-pointer text-sm items-center pr-2 border-white/50 border-r h-[16px]">
                            <icon class="w-[16px] h-[16px] block fill-white/70">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-[16px] h-[16px]"
                                    viewBox="0 96 960 960" width="48">
                                    <path
                                        d="M272 936V424l225-238q13.6-14 32.187-16.5Q547.773 167 565 177q17 10 25.5 27.5t4.2 36.5L556 424h299q24 0 42 18t18 42v81.839q0 7.161 1.5 14.661T915 595L789 885q-8.878 21.25-29.595 36.125Q738.689 936 716 936H272Zm60-487v427h397l126-299v-93H482l53-249-203 214ZM139 936q-24.75 0-42.375-17.625T79 876V484q0-24.75 17.625-42.375T139 424h133v60H139v392h133v60H139Zm193-60V449v427Z" />
                                </svg>
                            </icon>
                            <number>
                                77k
                            </number>
                        </like>
                        <dislike class="flex gap-2  cursor-pointer text-sm items-center ">
                            <icon class="w-[16px] h-[16px] block fill-white/70">
                                <svg class="w-[16px] h-[16px]" xmlns="http://www.w3.org/2000/svg" height="48"
                                    viewBox="0 96 960 960" width="48">
                                    <path
                                        d="M105 728q-24 0-42-18t-18-42v-81.839Q45 579 43.5 571.5T45 557l126-290q8.878-21.25 29.595-36.125Q221.311 216 244 216h444v512L463 966q-13.6 14-32.187 16.5Q412.227 985 395 975q-17-10-25.5-27.5t-4.2-36.5L404 728H105Zm523-25V276H231L105 575v93h373l-53 249 203-214Zm193-487q24.75 0 42.375 17.625T881 276v392q0 24.75-17.625 42.375T821 728H688v-60h133V276H688v-60h133Zm-193 60v427-427Z" />
                                </svg>
                            </icon>
                        </dislike>
                    </likes>
                </row>
                <row class="text-white text-sm font-light">
                    Theodor Capitani Von Kurnatowski is known best for his unique style of making people laugh through
                    real life stories and outlandish analogies. His podcast "This Past Weekend" is one of the best in
                    the game, but he can be just as hilarious as a guest. These are some of those best guest moments
                    that are too funny to not laugh. Thank you for watching!
                </row>
                <row class="text-white text-sm">
                    4,966,989 views 27 Oct 2022 Funniest Moments Ever
                </row>
            </content>
        </inside>
    </modal>


    <box class="box bg-gradient-to-br block overflow-hidden free cursor-grab dragscroll active:cursor-grabbing   ">
        <map class="block relative w-[1920px] h-[1080px]">
            <img src="{{ asset('game/home-1.png') }}" l='1032' t='685' class="house" data-id="h1"
                style="opacity: 0;">
        </map>
        <dialog
            class="dialog-box  rounded-xl bg-black/90 w-[1120px] h-max text-xl left-0 right-0 mx-auto text-white p-6 font-light fixed bottom-5"
            style="display:none;">
        </dialog>

    </box>

    <input type="hidden" class="story" value="{{ auth()->user()->story }}">
    <script src="{{ asset('libs/js/dragscroll.min.js') }}"></script>

    @vite('resources/js/app.js')

</x-layout>
