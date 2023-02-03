<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('style')
    <script defer src="{{asset('assets/js/alpine.js')}}"></script>
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body dir="rtl" class="bg-gray-100 h-full overflow-hidden">
    <div x-data="sidebarMenu" class="flex w-full">
        <!--    sidebar menu -->
        <div x-cloak x-bind:class="openSidebar ? 'w-80 duration-300' : 'w-0 duration-300'" class="bg-dark-purple flex flex-col pt-4 h-screen">
            <!--      iut logo -->
            <div x-cloak x-bind:class="openSidebar ? 'scale-100' : 'scale-0'" class="p-3 text-yellow-500 flex duration-150 flex-col mx-3 justify-center items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.0" width="50px" height="50px"
                     viewBox="0 0 690.000000 690.000000" preserveAspectRatio="xMidYMid meet">

                    <g transform="translate(0.000000,690.000000) scale(0.100000,-0.100000)" fill="#ffb142" stroke="none">
                        <path d="M3235 6874 c-209 -20 -278 -29 -395 -50 -964 -174 -1816 -759 -2324 -1597 -257 -424 -416 -894 -478 -1412 -19 -163 -16 -606 6 -770 75 -563 262 -1059 570 -1515 509 -753 1320 -1280 2221 -1444 229 -42 337 -51 620 -51 283 0 391 9 620 51 901 164 1712 691 2221 1444 309 456 494 950 570 1515 22 164 25 606 6 770 -112 937 -555 1741 -1277 2318 -486 389 -1085 640 -1726 722 -117 15 -543 28 -634 19z m390 -104 c572 -33 1065 -182 1540 -464 861 -513 1452 -1398 1590 -2382 87 -622 -5 -1274 -261 -1834 -492 -1079 -1508 -1810 -2689 -1936 -128 -13 -563 -21 -596 -10 -8 3 -50 7 -94 11 -200 15 -503 81 -733 160 -497 170 -908 429 -1287 809 -535 538 -849 1192 -947 1971 -16 129 -16 589 1 720 80 649 315 1217 707 1710 172 216 456 483 690 647 501 353 1109 564 1724 597 80 4 154 9 165 9 11 1 97 -3 190 -8z"/>
                        <path d="M3118 6566 c-179 -21 -166 -13 -161 -98 3 -40 11 -136 17 -213 7 -79 9 -143 4 -146 -5 -3 -46 -14 -91 -23 -45 -10 -128 -31 -183 -47 -56 -16 -104 -29 -107 -29 -4 0 -51 87 -107 194 l-101 195 -122 -50 c-179 -74 -371 -177 -547 -295 -85 -57 -168 -114 -184 -128 l-29 -24 107 -192 106 -192 -147 -144 c-80 -79 -148 -144 -150 -144 -2 0 -85 52 -184 115 -99 64 -184 113 -188 110 -17 -10 -160 -202 -223 -300 -36 -55 -91 -147 -122 -204 -57 -105 -156 -315 -156 -330 0 -4 84 -57 188 -116 103 -59 188 -109 189 -110 2 -1 -9 -35 -23 -76 -14 -41 -38 -126 -55 -189 -16 -62 -31 -115 -32 -116 -1 -1 -101 -7 -222 -13 -121 -7 -221 -14 -223 -16 -8 -7 -32 -194 -42 -320 -15 -204 4 -593 36 -722 6 -22 7 -23 227 -25 l220 -3 29 -110 c15 -60 39 -144 53 -185 14 -41 25 -78 25 -82 0 -4 -85 -55 -190 -115 -163 -93 -189 -111 -184 -128 14 -50 199 -410 258 -503 74 -116 225 -322 236 -322 5 0 86 48 181 106 95 58 177 108 184 110 6 3 76 -60 156 -139 l146 -144 -109 -184 c-59 -101 -108 -187 -108 -192 0 -11 197 -154 312 -227 189 -118 539 -283 558 -263 5 4 54 89 110 188 56 99 103 181 104 182 1 1 42 -11 91 -26 50 -16 136 -40 192 -52 l103 -24 2 -220 3 -220 90 -13 c142 -20 596 -24 740 -7 66 8 130 17 143 20 22 5 22 6 22 219 l0 215 58 11 c31 6 117 27 190 47 72 20 134 34 136 32 2 -2 49 -86 106 -185 l101 -182 48 18 c244 93 515 244 738 412 93 69 93 69 79 96 -8 15 -55 96 -104 181 l-90 154 151 147 151 147 165 -100 c91 -55 172 -101 180 -103 39 -9 276 347 401 601 49 99 92 192 95 207 6 25 0 30 -167 124 -95 53 -174 98 -175 99 -2 1 8 35 22 76 23 65 49 158 85 297 l11 42 204 0 203 0 6 28 c31 150 49 598 30 777 -10 104 -32 256 -37 261 -3 3 -96 8 -207 12 l-203 7 -32 122 c-18 67 -44 156 -59 197 -14 41 -26 76 -26 79 0 2 79 51 175 107 154 91 175 106 169 124 -17 57 -170 356 -242 471 -99 160 -243 350 -263 349 -8 -1 -90 -48 -181 -106 l-166 -106 -106 107 c-58 58 -126 122 -151 141 -24 19 -44 38 -45 42 0 4 46 89 101 189 l102 182 -24 19 c-58 46 -272 190 -353 237 -190 112 -487 244 -505 226 -5 -6 -51 -86 -101 -180 -51 -93 -95 -173 -99 -178 -4 -4 -63 8 -132 27 -68 18 -157 39 -196 46 -40 7 -73 18 -73 24 0 6 9 101 20 210 11 110 17 202 14 205 -30 31 -642 50 -846 27z m520 -260 c4 -4 8 -95 10 -202 2 -140 7 -196 15 -199 7 -1 70 -11 141 -20 201 -26 444 -93 618 -169 l37 -16 19 33 c11 17 54 96 97 175 42 78 81 142 87 142 15 0 236 -115 306 -160 l63 -40 -95 -183 -96 -184 48 -33 c84 -60 165 -130 276 -238 96 -96 247 -270 274 -318 11 -20 5 -23 261 154 l94 66 27 -33 c27 -31 173 -272 184 -301 4 -11 -42 -42 -179 -119 -102 -57 -185 -104 -185 -106 0 -1 18 -40 39 -86 84 -180 157 -439 186 -656 7 -58 15 -106 17 -108 1 -1 99 -5 217 -9 118 -3 217 -8 219 -11 9 -9 15 -292 7 -379 l-7 -86 -186 7 c-103 4 -202 7 -221 7 l-34 1 -18 -121 c-29 -202 -98 -437 -183 -628 -14 -32 -26 -62 -26 -66 0 -4 86 -60 190 -125 l190 -118 -36 -66 c-41 -74 -146 -246 -168 -275 -14 -17 -25 -12 -206 99 -105 65 -192 116 -194 114 -2 -2 -32 -40 -66 -84 -89 -113 -307 -327 -422 -414 -54 -41 -98 -76 -98 -78 0 -3 15 -32 34 -66 18 -34 65 -123 105 -199 l71 -136 -73 -46 c-90 -55 -238 -136 -252 -136 -6 0 -62 83 -125 186 -62 102 -116 187 -120 189 -4 2 -49 -13 -101 -35 -186 -76 -446 -141 -662 -165 l-57 -7 1 -225 c0 -123 -1 -226 -3 -229 -9 -9 -260 -14 -331 -7 l-78 8 -3 80 c-2 44 -4 148 -5 230 l-1 151 -98 11 c-182 22 -379 76 -586 160 -60 24 -112 40 -116 36 -4 -4 -60 -91 -125 -193 -65 -102 -119 -186 -120 -188 -9 -10 -315 165 -315 180 0 5 45 98 100 208 55 110 100 203 100 208 0 4 -49 48 -109 96 -128 102 -300 276 -391 394 -35 45 -66 82 -69 82 -3 0 -96 -54 -206 -120 -184 -110 -201 -119 -213 -102 -24 31 -118 186 -161 263 l-41 76 204 128 205 128 -23 46 c-38 75 -105 266 -137 390 -24 91 -68 334 -69 374 0 4 -105 7 -234 7 l-233 0 -7 31 c-8 40 -6 324 3 364 l6 30 228 11 c125 6 229 13 231 15 3 2 11 56 20 120 28 201 102 462 187 656 13 29 21 54 18 56 -2 2 -85 52 -184 112 -99 59 -184 111 -189 116 -5 4 8 38 29 76 54 97 169 273 178 273 5 0 88 -56 187 -124 l178 -124 48 67 c128 173 324 371 497 500 l57 43 -42 77 c-23 42 -70 126 -104 186 l-61 110 46 31 c112 75 315 179 331 169 4 -2 31 -46 60 -97 30 -51 75 -130 102 -175 l48 -81 78 33 c174 73 430 142 612 165 46 5 90 10 98 10 7 0 12 6 11 13 -5 24 13 375 20 385 3 6 20 12 36 15 43 8 304 1 313 -7z"/>
                        <path d="M3223 5652 c-19 -12 -4 -62 19 -62 16 0 19 6 16 32 -3 33 -15 43 -35 30z"/>
                        <path d="M3520 5620 c0 -36 3 -40 25 -40 23 0 25 4 25 40 0 36 -2 40 -25 40 -22 0 -25 -4 -25 -40z"/>
                        <path d="M3157 5643 c-3 -4 -3 -20 0 -36 4 -18 12 -27 25 -27 16 0 19 6 16 32 -3 31 -29 51 -41 31z"/>
                        <path d="M2613 5560 c-21 -8 -20 -12 48 -186 38 -97 70 -179 72 -181 7 -7 37 9 37 20 0 9 -128 349 -133 353 -1 1 -12 -2 -24 -6z"/>
                        <path d="M3353 5560 c-47 -19 -49 -62 -5 -113 19 -22 13 -27 -36 -34 -47 -6 -58 8 -69 82 -4 34 -9 45 -20 41 -8 -4 -19 -6 -24 -6 -5 0 -6 -26 -3 -59 8 -69 9 -68 -95 -91 l-76 -16 -3 -36 c-3 -35 -3 -35 43 -41 68 -7 75 -19 33 -61 -30 -30 -43 -36 -77 -36 -49 0 -67 22 -85 102 -9 41 -16 54 -32 56 -19 3 -20 0 -14 -55 8 -67 32 -128 62 -160 31 -33 70 -38 122 -15 59 27 98 85 100 149 1 42 4 48 23 51 13 2 29 13 38 24 14 20 16 21 33 5 27 -25 76 -21 109 7 28 24 28 24 49 5 33 -31 87 -36 111 -10 19 20 19 20 36 1 21 -25 94 -28 103 -5 8 21 21 19 29 -4 7 -22 44 -36 118 -46 43 -6 50 -4 76 23 68 68 62 232 -8 232 -29 0 -79 -38 -117 -89 -21 -28 -42 -48 -46 -45 -5 3 -8 29 -6 57 3 47 1 52 -18 55 -19 3 -23 -3 -29 -45 -8 -57 -19 -73 -50 -73 -36 0 -55 31 -55 88 0 49 -2 52 -25 52 -23 0 -25 -3 -25 -49 0 -69 -7 -81 -44 -81 -18 0 -35 2 -38 5 -3 3 2 25 10 49 15 40 15 46 -1 70 -18 27 -51 33 -94 16z m545 -123 c5 -41 -22 -67 -62 -61 -61 11 -62 12 -20 55 46 47 77 49 82 6z"/>
                        <path d="M4337 5379 c-62 -143 -77 -200 -57 -224 18 -22 100 -65 124 -65 12 0 26 4 32 10 7 7 14 -1 22 -23 16 -44 67 -78 98 -67 22 9 24 7 24 -19 0 -35 22 -55 55 -49 18 4 25 1 25 -11 0 -9 7 -27 16 -40 13 -18 23 -22 45 -17 25 5 29 2 29 -17 0 -27 55 -97 77 -97 32 0 85 44 113 94 17 28 30 54 30 59 0 4 -13 7 -29 7 -22 0 -31 -6 -41 -30 -20 -49 -37 -57 -65 -30 -32 30 -31 52 1 108 23 39 24 46 11 59 -13 13 -19 9 -52 -31 -44 -54 -82 -64 -70 -18 3 15 18 42 32 60 24 32 24 35 9 50 -16 16 -20 14 -60 -32 -26 -30 -47 -47 -54 -42 -18 11 -14 35 14 84 24 40 25 46 10 60 -8 9 -17 14 -19 11 -49 -65 -71 -89 -84 -89 -8 0 -28 13 -44 29 -33 33 -35 57 -18 159 l12 65 67 -7 c57 -5 69 -3 74 10 14 36 7 42 -63 49 -109 11 -118 4 -141 -120 -16 -87 -20 -95 -38 -95 -23 0 -81 36 -88 55 -3 8 19 71 50 140 31 70 54 131 51 136 -4 5 -14 9 -23 9 -12 0 -34 -38 -75 -131z"/>
                        <path d="M4133 5428 c-55 -60 -71 -160 -33 -198 26 -26 66 -35 96 -21 32 14 63 84 58 128 -5 38 -30 94 -48 105 -21 14 -53 8 -73 -14z m67 -114 c0 -47 -61 -42 -68 5 -2 13 5 32 14 43 18 20 19 20 36 -2 10 -12 18 -33 18 -46z"/>
                        <path d="M4530 5433 c0 -17 9 -21 46 -27 83 -11 104 -8 104 14 0 14 -7 20 -22 20 -13 0 -47 3 -75 6 -48 6 -53 5 -53 -13z"/>
                        <path d="M2495 5360 c-22 -24 -37 -110 -28 -162 3 -24 2 -38 -5 -38 -13 0 -49 44 -57 70 -5 16 -10 17 -31 8 l-24 -11 25 -43 c31 -53 31 -65 2 -92 -29 -28 -33 -28 -41 3 -9 37 -65 95 -90 95 -25 0 -66 -34 -66 -55 0 -28 21 -68 52 -97 l31 -29 -33 -28 c-27 -22 -34 -35 -34 -64 0 -21 -3 -37 -6 -37 -3 0 -32 32 -64 70 -31 39 -61 70 -65 70 -5 0 -14 -7 -21 -15 -10 -12 -6 -22 24 -57 20 -23 36 -49 36 -58 0 -20 -31 -50 -51 -50 -8 0 -60 44 -117 97 -97 90 -104 95 -120 79 -16 -16 -10 -23 93 -121 154 -146 185 -158 240 -93 24 28 27 29 43 15 28 -26 88 -47 132 -47 45 0 46 0 25 40 -12 23 -23 29 -52 32 -52 4 -55 30 -10 77 19 20 38 46 42 59 5 17 14 22 37 22 42 0 98 43 98 76 0 27 3 28 32 13 29 -15 142 43 158 82 21 51 -6 126 -65 178 -41 36 -65 39 -90 11z m87 -77 c29 -26 23 -59 -16 -82 -52 -33 -59 -29 -51 32 4 28 9 55 12 60 7 12 36 8 55 -10z m-304 -165 c15 -15 16 -58 2 -58 -5 0 -19 9 -31 21 -16 16 -18 23 -8 35 14 17 21 18 37 2z"/>
                        <path d="M2144 5266 c-17 -13 -17 -15 -1 -40 10 -14 24 -26 33 -26 24 0 27 28 6 54 -17 22 -22 24 -38 12z"/>
                        <path d="M4846 5225 c-14 -21 -15 -29 -5 -41 10 -13 14 -12 30 2 22 20 24 37 5 53 -11 9 -17 6 -30 -14z"/>
                        <path d="M4774 5176 c-29 -45 7 -64 39 -21 17 23 17 25 -3 35 -16 9 -22 6 -36 -14z"/>
                        <path d="M4815 5140 c-15 -16 -15 -22 -5 -35 17 -20 22 -19 44 11 15 22 16 28 5 35 -20 12 -24 11 -44 -11z"/>
                        <path d="M4987 4992 c-26 -28 -27 -29 -9 -45 17 -16 20 -15 45 11 26 28 27 29 9 45 -17 16 -20 15 -45 -11z"/>
                        <path d="M2890 4985 c0 -20 25 -69 107 -212 35 -61 77 -147 92 -190 28 -75 63 -232 76 -338 4 -27 9 -61 11 -75 10 -53 21 -660 22 -1235 2 -553 3 -601 19 -613 18 -13 131 -16 150 -4 10 6 13 230 15 1008 3 831 5 1004 17 1017 10 12 30 17 71 17 62 0 73 -7 84 -54 4 -16 7 -468 6 -1006 0 -888 1 -978 16 -984 28 -11 130 -6 148 7 16 12 17 48 17 507 0 669 14 1288 33 1415 36 243 73 358 164 517 76 132 112 203 112 223 0 13 -66 15 -580 15 -516 0 -580 -2 -580 -15z"/>
                        <path d="M5128 4947 c-7 -6 -65 -57 -128 -111 -63 -55 -121 -105 -129 -112 -12 -11 -12 -16 -1 -28 7 -9 15 -16 19 -16 6 0 74 58 205 174 38 33 73 64 79 68 7 4 7 12 -2 22 -16 19 -25 20 -43 3z"/>
                        <path d="M1862 4794 c2 -19 12 -29 38 -40 76 -32 129 -108 111 -157 -20 -53 -79 -56 -143 -6 -21 17 -43 26 -52 23 -23 -9 -20 -16 22 -56 62 -61 138 -83 196 -57 26 12 56 63 56 95 0 57 -101 179 -175 210 -48 20 -55 18 -53 -12z"/>
                        <path d="M1780 4744 c-11 -12 -9 -19 10 -39 22 -23 25 -24 42 -8 14 12 15 19 6 30 -22 27 -45 34 -58 17z"/>
                        <path d="M5150 4678 c-33 -73 -56 -108 -71 -108 -18 0 -61 79 -54 99 7 24 -13 28 -45 11 -62 -33 -3 -170 73 -170 57 0 99 39 145 135 23 47 42 90 42 96 0 5 -13 9 -29 9 -25 0 -31 -7 -61 -72z"/>
                        <path d="M2387 4546 c-51 -19 -67 -34 -67 -63 0 -16 10 -30 34 -44 19 -11 37 -30 42 -42 4 -12 9 -250 11 -530 l4 -507 92 -46 c51 -26 107 -59 125 -75 64 -56 62 -65 62 309 0 247 4 343 13 361 17 33 59 46 94 29 50 -24 53 -49 51 -463 -1 -269 2 -388 11 -408 10 -27 150 -199 172 -212 12 -8 11 1149 -2 1227 -31 193 -147 337 -349 435 -67 33 -85 37 -165 40 -60 2 -103 -1 -128 -11z"/>
                        <path d="M4324 4542 c-68 -24 -178 -90 -238 -143 -62 -55 -120 -144 -148 -228 -22 -64 -23 -80 -26 -606 -2 -297 -2 -580 0 -628 l3 -88 78 90 c42 49 84 102 92 118 12 23 15 95 15 421 0 335 2 397 15 423 32 61 113 59 134 -3 7 -20 11 -153 11 -359 0 -234 3 -329 11 -329 6 0 28 13 48 29 20 16 78 49 129 75 l92 46 0 486 c0 531 3 565 51 589 51 27 49 74 -5 102 -48 26 -197 28 -262 5z"/>
                        <path d="M4820 4198 c-39 -14 -80 -58 -106 -113 -23 -49 -24 -55 -24 -360 0 -170 4 -316 9 -324 7 -11 25 -13 79 -8 39 4 77 10 86 13 14 5 16 49 16 395 0 360 -1 389 -17 397 -11 6 -28 6 -43 0z"/>
                        <path d="M2067 4193 c-4 -3 -7 -181 -7 -394 0 -355 1 -387 17 -393 9 -4 52 -10 94 -13 l76 -6 -1 334 -1 334 -27 46 c-15 26 -42 59 -59 73 -29 24 -77 34 -92 19z"/>
                        <path d="M1995 3236 c-152 -34 -276 -108 -395 -233 -93 -98 -100 -117 -37 -106 87 16 228 8 302 -16 145 -49 323 -154 432 -255 67 -62 148 -165 181 -232 36 -71 42 -74 152 -74 54 0 101 4 104 8 8 13 -38 116 -90 199 -62 101 -204 241 -319 317 -122 80 -137 103 -94 142 49 44 143 13 287 -95 148 -112 248 -241 328 -423 68 -155 60 -148 155 -148 62 0 81 3 85 15 16 41 -88 266 -207 445 -160 243 -366 404 -576 454 -77 17 -232 18 -308 2z"/>
                        <path d="M4624 3231 c-213 -58 -408 -212 -562 -445 -112 -170 -212 -378 -212 -441 0 -25 1 -25 84 -25 55 0 87 4 94 13 6 6 35 66 64 132 68 153 120 229 227 335 137 136 282 220 353 205 34 -8 62 -46 54 -73 -4 -10 -47 -45 -96 -76 -168 -109 -306 -260 -389 -423 -17 -34 -31 -74 -31 -88 l0 -25 100 0 c91 0 100 2 115 23 8 12 42 63 74 112 103 157 255 281 466 381 141 67 259 86 390 64 28 -4 54 -5 58 -1 4 5 -10 30 -31 57 -97 122 -222 211 -367 260 -109 37 -284 44 -391 15z"/>
                        <path d="M5200 2770 c-150 -32 -214 -59 -340 -143 -131 -88 -340 -314 -340 -368 0 -19 133 -123 150 -117 5 1 40 41 78 88 90 113 209 208 348 276 150 74 234 91 387 78 62 -6 114 -9 115 -8 2 1 1 16 -3 33 -10 45 -73 135 -109 157 -43 25 -176 28 -286 4z"/>
                        <path d="M1454 2766 c-35 -15 -70 -58 -103 -123 -37 -74 -38 -74 112 -67 103 5 147 3 200 -10 190 -45 405 -191 537 -365 35 -47 59 -70 69 -66 34 13 141 100 141 115 0 55 -203 276 -341 370 -104 71 -153 94 -269 127 -107 31 -298 41 -346 19z"/>
                        <path d="M3371 2158 c-46 -31 -71 -76 -78 -140 -4 -44 -1 -59 19 -88 30 -45 99 -80 158 -80 167 0 243 198 114 296 -31 24 -48 29 -108 32 -61 3 -76 1 -105 -20z"/>
                        <path d="M2725 2149 c-200 -30 -367 -134 -443 -278 -48 -90 -65 -162 -66 -291 l-1 -115 493 -3 492 -2 0 174 c0 129 -3 177 -12 183 -7 4 -160 6 -340 5 -282 -3 -328 -2 -328 11 0 28 42 67 108 99 l66 33 251 5 250 5 0 90 0 90 -205 1 c-113 1 -232 -2 -265 -7z"/>
                        <path d="M3743 2149 c-17 -18 -17 -153 0 -167 7 -6 107 -12 257 -14 l246 -3 66 -33 c64 -31 119 -85 103 -100 -4 -4 -152 -7 -329 -7 -259 0 -326 -3 -339 -14 -15 -11 -17 -36 -17 -170 0 -86 4 -162 8 -169 7 -10 113 -12 498 -10 l489 3 -2 97 c-2 129 -17 196 -63 294 -30 62 -54 95 -102 140 -136 126 -235 154 -573 161 -179 4 -233 2 -242 -8z"/>
                        <path d="M3389 1558 c-80 -102 -132 -176 -153 -216 l-16 -30 125 -63 125 -63 114 58 c63 31 119 63 125 70 8 10 -2 31 -38 82 -80 112 -185 239 -202 242 -9 2 -40 -29 -80 -80z"/>
                    </g>
                </svg>
                <span class="text-xs h-5 whitespace-nowrap overflow-hidden font-bold">Isfahan University Of Technology</span>
            </div>
            <!--      menu -->
            <div class="mt-8 px-3 flex flex-col">
                <!--        role management -->
                <a href="{{route('admin.role.index')}}" x-cloak x-bind:class="{'hidden' : !openSidebar}" class="flex mb-2 flex-row hover:bg-white duration-150 rounded-md px-2 hover:bg-opacity-10 gap-3 w-full items-center h-9 hover:cursor-pointer group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 duration-150 group-hover:text-gray-200 text-gray-300 h-6">
                        <path d="M10.5 1.875a1.125 1.125 0 012.25 0v8.219c.517.162 1.02.382 1.5.659V3.375a1.125 1.125 0 012.25 0v10.937a4.505 4.505 0 00-3.25 2.373 8.963 8.963 0 014-.935A.75.75 0 0018 15v-2.266a3.368 3.368 0 01.988-2.37 1.125 1.125 0 011.591 1.59 1.118 1.118 0 00-.329.79v3.006h-.005a6 6 0 01-1.752 4.007l-1.736 1.736a6 6 0 01-4.242 1.757H10.5a7.5 7.5 0 01-7.5-7.5V6.375a1.125 1.125 0 012.25 0v5.519c.46-.452.965-.832 1.5-1.141V3.375a1.125 1.125 0 012.25 0v6.526c.495-.1.997-.151 1.5-.151V1.875z" />
                    </svg>

                    <span class="text-gray-300 whitespace-nowrap duration-150 group-hover:text-gray-200 text-xs">مدیریت نقش ها</span>
                </a>
                <!--        select unit -->
                <div x-on:click="openSubUnit()" x-cloak x-bind:class="{'hidden' : !openSidebar}" class="flex mb-2 flex-row hover:bg-white justify-between duration-150 rounded-md px-2 hover:bg-opacity-10 gap-3 w-full items-center h-9 hover:cursor-pointer group">
                    <div class="flex flex-row items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 duration-150 group-hover:text-gray-200 text-gray-300 h-6">
                            <path fill-rule="evenodd" d="M7.502 6h7.128A3.375 3.375 0 0118 9.375v9.375a3 3 0 003-3V6.108c0-1.505-1.125-2.811-2.664-2.94a48.972 48.972 0 00-.673-.05A3 3 0 0015 1.5h-1.5a3 3 0 00-2.663 1.618c-.225.015-.45.032-.673.05C8.662 3.295 7.554 4.542 7.502 6zM13.5 3A1.5 1.5 0 0012 4.5h4.5A1.5 1.5 0 0015 3h-1.5z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M3 9.375C3 8.339 3.84 7.5 4.875 7.5h9.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 013 20.625V9.375zm9.586 4.594a.75.75 0 00-1.172-.938l-2.476 3.096-.908-.907a.75.75 0 00-1.06 1.06l1.5 1.5a.75.75 0 001.116-.062l3-3.75z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-300 duration-150 whitespace-nowrap group-hover:text-gray-200 text-xs">انتخاب واحد</span>
                    </div>
                    <!--                arrow -->
                    <div>
                        <svg x-cloak x-bind:class="subMenuSelectUnit ? 'rotate-0' : 'rotate-90'"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 duration-150 group-hover:text-gray-200 text-gray-400 h-4">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <!--                subMenu SelectUnit-->
                <div x-cloak x-bind:class="{'hidden' : !openSidebar}" class="border-r border-r-gray-500 mr-4">
                    <ul x-cloak x-bind:class="subMenuSelectUnit ? 'max-h-52' : 'max-h-0'" class=" pr-2 overflow-hidden transition-all ease-in-out duration-500 text-gray-300 group-hover:text-gray-200 text-xs ">
                        <li class="p-2 hover:cursor-pointer hover:bg-white hover:bg-opacity-10 rounded-sm">لیست دروس اراعه شده</li>
                        <li class="p-2 hover:cursor-pointer hover:bg-white hover:bg-opacity-10 rounded-sm">ثبت دروس</li>
                        <li class="mb-3 p-2 hover:cursor-pointer hover:bg-white hover:bg-opacity-10 rounded-sm">برنامه هفتگی در طول انتخاب واحد</li>
                    </ul>
                </div>
                <!--        insert data -->
                <div x-on:click="openSubData()" x-cloak x-bind:class="{'hidden' : !openSidebar}" class="flex mb-2 flex-row hover:bg-white justify-between duration-150 rounded-md px-2 hover:bg-opacity-10 gap-3 w-full items-center h-9 hover:cursor-pointer group">
                    <div class="flex flex-row items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 duration-150 group-hover:text-gray-200 text-gray-300 h-6">
                            <path d="M21 6.375c0 2.692-4.03 4.875-9 4.875S3 9.067 3 6.375 7.03 1.5 12 1.5s9 2.183 9 4.875z" />
                            <path d="M12 12.75c2.685 0 5.19-.586 7.078-1.609a8.283 8.283 0 001.897-1.384c.016.121.025.244.025.368C21 12.817 16.97 15 12 15s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.285 8.285 0 001.897 1.384C6.809 12.164 9.315 12.75 12 12.75z" />
                            <path d="M12 16.5c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 001.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 001.897 1.384C6.809 15.914 9.315 16.5 12 16.5z" />
                            <path d="M12 20.25c2.685 0 5.19-.586 7.078-1.609a8.282 8.282 0 001.897-1.384c.016.121.025.244.025.368 0 2.692-4.03 4.875-9 4.875s-9-2.183-9-4.875c0-.124.009-.247.025-.368a8.284 8.284 0 001.897 1.384C6.809 19.664 9.315 20.25 12 20.25z" />
                        </svg>
                        <span class="text-gray-300 duration-150 whitespace-nowrap group-hover:text-gray-200 text-xs">داده ها</span>
                    </div>
                    <!--                arrow -->
                    <div>
                        <svg x-cloak x-bind:class="subMenuInsertData ? 'rotate-0' : 'rotate-90'"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 duration-150 group-hover:text-gray-200 text-gray-400 h-4">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
                <!--                subMenu insertData -->
                <div x-cloak x-bind:class="{'hidden' : !openSidebar}" class="border-r border-r-gray-500 mr-4">
                    <ul x-cloak x-bind:class="subMenuInsertData ? 'max-h-52' : 'max-h-0'" class=" pr-2 overflow-hidden transition-all ease-in-out duration-500 text-gray-300 group-hover:text-gray-200 text-xs ">
                        <li class="flex hover:cursor-pointer hover:bg-white hover:bg-opacity-10 rounded-sm"><a href="{{route('admin.unit.index')}}" class="flex-1 p-2">دروس</a></li>
                        <li class="flex hover:cursor-pointer hover:bg-white hover:bg-opacity-10 rounded-sm"><a href="{{route('admin.professor.index')}}" class="flex-1 p-2">اساتید</a></li>
                        <li class="flex hover:cursor-pointer hover:bg-white hover:bg-opacity-10 rounded-sm"><a href="{{route('admin.unit.index')}}" class="flex-1 p-2">دانشجویان</a></li>
                    </ul>
                </div>
                <!--        contact -->
                <div x-cloak x-bind:class="{'hidden' : !openSidebar}" class="flex flex-row hover:bg-white mb-2 duration-150 rounded-md px-2 hover:bg-opacity-10 gap-3 w-full items-center h-9 hover:cursor-pointer group">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 duration-150 group-hover:text-gray-200 text-gray-300 h-6">
                        <path d="M3.478 2.405a.75.75 0 00-.926.94l2.432 7.905H13.5a.75.75 0 010 1.5H4.984l-2.432 7.905a.75.75 0 00.926.94 60.519 60.519 0 0018.445-8.986.75.75 0 000-1.218A60.517 60.517 0 003.478 2.405z" />
                    </svg>
                    <span class="text-gray-300 duration-150 whitespace-nowrap group-hover:text-gray-200 text-xs">درخواست ها</span>
                </div>
                {{-- log out --}}
                <form action="{{route('admin.logout')}}" method="post" x-cloak x-bind:class="{'hidden' : !openSidebar}" class="flex bg-red-500 flex-row items-center w-full mb-2 duration-150 rounded-md hover:bg-red-400 hover:bg-opacity-50 h-9 hover:cursor-pointer group">
                    @csrf
                    @method('DELETE')
                    <button class="flex flex-row gap-3 px-2 w-full h-full items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-6 h-6 text-gray-300 duration-150 group-hover:text-gray-200">
                            <path fill-rule="evenodd" d="M3 4.25A2.25 2.25 0 015.25 2h5.5A2.25 2.25 0 0113 4.25v2a.75.75 0 01-1.5 0v-2a.75.75 0 00-.75-.75h-5.5a.75.75 0 00-.75.75v11.5c0 .414.336.75.75.75h5.5a.75.75 0 00.75-.75v-2a.75.75 0 011.5 0v2A2.25 2.25 0 0110.75 18h-5.5A2.25 2.25 0 013 15.75V4.25z" clip-rule="evenodd" />
                            <path fill-rule="evenodd" d="M6 10a.75.75 0 01.75-.75h9.546l-1.048-.943a.75.75 0 111.004-1.114l2.5 2.25a.75.75 0 010 1.114l-2.5 2.25a.75.75 0 11-1.004-1.114l1.048-.943H6.75A.75.75 0 016 10z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-xs text-gray-300 duration-150 group-hover:text-gray-200">خروج</span>
                    </button>
                </form>
            </div>
        </div>
        <div class="w-full">
            <!--start navbar  -->
            <nav class="flex flex-row bg-blue-500 justify-between w-full px-8 bg-white shadow-sm h-14">
                <!-- hamberger Menu -->
                <div class="h-full flex-center">
                    <svg x-on:click="runOpenSidebar()" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                         class="w-8 cursor-pointer hover:shadow-md transition-all duration150 ease-in-out h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                </div>
                <!-- avatar -->
                <div class="h-full flex-center ">
                    <img src="{{asset('assets/images/statics/user.jpg')}}" class="w-10 h-10 rounded-full" alt="avatar">
                </div>
            </nav>
            <!-- end navbar -->
            <!-- start main -->
            <main class="container h-full">
                <div class="m-5 bg-gray-200 h-[600px] flex flex-col rounded-md ">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script>
        // sidebarMenu
        function sidebarMenu(){
            return{
                openSidebar : false,
                subMenuSelectUnit : false,
                subMenuInsertData : false,
                runOpenSidebar(){
                    if (this.openSidebar){
                        this.openSidebar = false;
                    }else {
                        this.openSidebar = true;
                    }
                },
                openSubUnit(){
                    if (this.subMenuSelectUnit){
                        this.subMenuSelectUnit = false;
                    }else {
                        this.subMenuSelectUnit = true;
                    }

                },
                openSubData(){
                    if (this.subMenuInsertData){
                        this.subMenuInsertData = false;
                    }else {
                        this.subMenuInsertData = true;
                    }

                }

            }
        }

    </script>
    @yield('script')
</body>
</html>
