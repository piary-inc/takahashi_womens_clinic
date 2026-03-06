<?php get_header(); ?>
<main class="pt-5">
    <section>
        
        <!-- top スライダー -->
        <div class="relative aspect-[375/382] md:aspect-auto md:h-[490px]">
            <div class="md:px-[18%] h-full overflow-hidden">
                <div x-data="{
                    current: 1,
                    animated: true,
                    images: window.innerWidth >= 768 ? [
                        '<?php echo get_site_url(); ?>/wp-content/uploads/2026/03/mv_pc_01.webp',
                        '<?php echo get_site_url(); ?>/wp-content/uploads/2026/03/mv_pc_02.webp',
                        '<?php echo get_site_url(); ?>/wp-content/uploads/2026/03/mv_pc_03.webp',
                    ] : [
                        '<?php echo get_site_url(); ?>/wp-content/uploads/2026/03/mv_sp_01.webp',
                        '<?php echo get_site_url(); ?>/wp-content/uploads/2026/03/mv_sp_02.webp',
                        '<?php echo get_site_url(); ?>/wp-content/uploads/2026/03/mv_sp_03.webp',
                    ],
                    get allImages() {
                        return [this.images[this.images.length - 1], ...this.images, this.images[0]]
                    },
                    init() {
                        setInterval(() => {
                            this.current++
                            if (this.current >= this.allImages.length - 1) {
                                setTimeout(() => {
                                    this.animated = false
                                    this.current = 1
                                    setTimeout(() => this.animated = true, 50)
                                }, 700)
                            }
                        }, 3000)
                    }
                }" class="h-full">
                    <div class="flex h-full"
                        :class="animated ? 'transition-transform duration-700' : ''"
                        :style="`transform: translateX(-${current * 100}%)`">
                        <template x-for="(img, index) in allImages" :key="index">
                            <div class="w-full flex-shrink-0 h-full">
                                <img :src="img" class="w-full h-full object-cover">
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <div class="absolute inset-0 flex flex-col justify-end gap-4 bg-black/25 pointer-events-none">
                <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full">
                    <div class="badge-staff w-full text-center mx-auto">
                        <h1 class="text-center font-['Zen_Maru_Gothic'] text-2xl border-b-2 border-main-pink pb-1 inline-block">スタッフ募集</h1>
                    </div>
                </div>
                <p class="text-[30px] lg:text-[45px] font-medium text-center pb-4 md:p-8 font-['Zen_Maru_Gothic'] text-white leading-[1.2]">
                    トップランナーとして<br class="md:hidden">積み上げた<span class="inline-block relative marker-pink">"信頼"</span>を<br>
                    切り拓く<span class="inline-block relative marker-pink">"未来の力"</span>に
                </p>
            </div>
        </div>

        <p class="content-inner py-8 md:py-12 text-left px-4 leading-[1.8] text-sm md:text-lg md:text-center md:px-0">
            パイオニアとして培った技術を継承し、更なる高みへ。 働くことが「人生の楽しみ」になる、<br class="hidden md:block">新しいクリニックの在り方を共に創りませんか。
        </p>
        <!-- SPのみ -->
        <div class="content-inner pb-8 px-4 md:hidden">
            <ul class="flex justify-around gap-2">
                <li>
                    <a href="" class="nav-btn relative flex flex-col items-center justify-center text-center pb-3 text-main-pink font-['Zen_Maru_Gothic'] font-bold border-2 border-main-pink rounded-[20px] shadow-main-pink w-[100px] h-[100px] md:w-[200px] md:h-[200px] text-sm md:text-lg">
                        募集要項
                    </a>
                </li>
                <li>
                    <a href="" class="nav-btn relative flex flex-col items-center justify-center text-center pb-3 text-main-pink font-['Zen_Maru_Gothic'] font-bold border-2 border-main-pink rounded-[20px] shadow-main-pink w-[100px] h-[100px] md:w-[200px] md:h-[200px] text-sm md:text-lg">
                        カジュアル<br>面談
                    </a>
                </li>
                <li>
                    <a href="" class="nav-btn relative flex flex-col items-center justify-center text-center pb-3 text-main-pink font-['Zen_Maru_Gothic'] font-bold border-2 border-main-pink rounded-[20px] shadow-main-pink w-[100px] h-[100px] md:w-[200px] md:h-[200px] text-sm md:text-lg">
                        応募は<br>こちらから
                    </a>
                </li>
            </ul>
        </div>
        <!-- PCのみ 固定ボタン -->
        <div x-data="{
            show: true,
            checkScroll() {
                const footer = document.querySelector('footer')
                if (footer) {
                    const footerTop = footer.getBoundingClientRect().top
                    this.show = footerTop > window.innerHeight
                }
            }
        }"
        x-init="checkScroll(); window.addEventListener('scroll', () => checkScroll())"
        x-show="show"
        class="hidden md:flex fixed bottom-8 right-8 flex-row gap-3 z-50">
            <a href="" class="nav-btn relative flex flex-col items-center justify-center text-center pb-3 text-main-pink font-['Zen_Maru_Gothic'] font-bold border-2 border-main-pink rounded-[20px] shadow-main-pink w-[100px] h-[100px] text-sm bg-white">
                募集要項
            </a>
            <a href="" class="nav-btn relative flex flex-col items-center justify-center text-center pb-3 text-main-pink font-['Zen_Maru_Gothic'] font-bold border-2 border-main-pink rounded-[20px] shadow-main-pink w-[100px] h-[100px] text-sm bg-white">
                カジュアル<br>面談
            </a>
            <a href="" class="nav-btn relative flex flex-col items-center justify-center text-center pb-3 text-main-pink font-['Zen_Maru_Gothic'] font-bold border-2 border-main-pink rounded-[20px] shadow-main-pink w-[100px] h-[100px] text-sm bg-white">
                応募は<br>こちらから
            </a>
        </div>
        <section class="py-12 bg-main-pink02">
            <div class="content-inner px-4 md:px-0">
                <div class="text-center">
                    <!-- PC -->
                    <h2 class="hidden md:inline-block font-['Zen_Maru_Gothic'] text-2xl font-medium border-b-2 border-main-pink pb-1">
                        1ページでわかる 高橋ウイメンズクリニック
                    </h2>
                    <!-- SP -->
                    <h2 class="md:hidden font-['Zen_Maru_Gothic'] text-2xl font-medium leading-[1.8]">
                        <span class="inline-block border-b-2 border-main-pink leading-[1.2]">1ページでわかる</span><br>
                        <span class="inline-block border-b-2 border-main-pink leading-[1.2]">高橋ウイメンズクリニック</span>
                    </h2>
                </div>

                <div class="bg-white md:bg-transparent rounded-[10px] md:rounded-none px-4 md:px-0 py-4 md:py-0 my-12 md:my-0">
                    <p class="text-center font-['Zen_Maru_Gothic'] text-2xl text-main-pink font-midium pt-4 md:pt-6 pb-4 md:pb-0 border-b border-[#CCC] md:border-none">数字で見るクリニック</p>

                    <ul class="md:flex md:flex-wrap md:justify-center md:gap-2 md:mt-6">
                        <li class="py-6 px-4 md:bg-white md:rounded-[10px] md:w-[31%] border-b border-[#CCC] md:border-none">
                            <div class="flex items-center">
                                <fidure><img src="/wp-content/uploads/2026/03/num01.webp" width="90" height="90"></fidure>
                                <p class="pl-4 md:pl-2 font-['Zen_Maru_Gothic'] text-2xl">通算妊娠数<br><span class="text-main-pink">24,530名</span>以上</p>
                            </div>
                            <div class="flex items-center mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <g id="グループ_78" data-name="グループ 78" transform="translate(-44 -1328)">
                                        <g id="楕円形_5" data-name="楕円形 5" transform="translate(44 1328)" fill="none" stroke="#4daf82" stroke-width="1">
                                        <circle cx="10" cy="10" r="10" stroke="none"/>
                                        <circle cx="10" cy="10" r="9.5" fill="none"/>
                                        </g>
                                        <path id="パス_3" data-name="パス 3" d="M1709.348,1339l3.84,4.22,6.258-6.878" transform="translate(-1660.491 -1.103)" fill="none" stroke="#4daf82" stroke-width="1"/>
                                    </g>
                                </svg>
                                <p class="text-xs md:text-[11px] ml-2">少子化という社会課題に向き合っています。</p>
                            </div>
                        </li>
                        <li class="py-6 px-4 md:bg-white md:rounded-[10px] md:w-[31%] border-b border-[#CCC] md:border-none">
                            <div class="flex items-center">
                                <fidure><img src="/wp-content/uploads/2026/03/num02.webp" width="90" height="90"></fidure>
                                <p class="pl-4 md:pl-2 font-['Zen_Maru_Gothic'] text-2xl leading-[1]">不妊治療歴<span class="text-main-pink">27年</span><br><span class="text-sm">（1999年開院）</span></p>
                            </div>
                            <div class="flex items-center mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <g id="グループ_78" data-name="グループ 78" transform="translate(-44 -1328)">
                                        <g id="楕円形_5" data-name="楕円形 5" transform="translate(44 1328)" fill="none" stroke="#4daf82" stroke-width="1">
                                        <circle cx="10" cy="10" r="10" stroke="none"/>
                                        <circle cx="10" cy="10" r="9.5" fill="none"/>
                                        </g>
                                        <path id="パス_3" data-name="パス 3" d="M1709.348,1339l3.84,4.22,6.258-6.878" transform="translate(-1660.491 -1.103)" fill="none" stroke="#4daf82" stroke-width="1"/>
                                    </g>
                                </svg>
                                <p class="text-xs md:text-[11px] ml-2">不妊治療黎明期から積み上げてきた実績。</p>
                            </div>
                        </li>
                        <li class="py-6 px-4 md:bg-white md:rounded-[10px] md:w-[31%] border-b border-[#CCC] md:border-none">
                            <div class="flex items-center">
                                <fidure><img src="/wp-content/uploads/2026/03/num03.webp" width="90" height="90"></fidure>
                                <p class="pl-4 md:pl-2 font-['Zen_Maru_Gothic'] text-2xl">月間妊娠数 <br><span class="text-main-pink">100名超</span><span class="text-sm">（直近実績）</span></p>
                            </div>
                            <div class="flex items-center mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <g id="グループ_78" data-name="グループ 78" transform="translate(-44 -1328)">
                                        <g id="楕円形_5" data-name="楕円形 5" transform="translate(44 1328)" fill="none" stroke="#4daf82" stroke-width="1">
                                        <circle cx="10" cy="10" r="10" stroke="none"/>
                                        <circle cx="10" cy="10" r="9.5" fill="none"/>
                                        </g>
                                        <path id="パス_3" data-name="パス 3" d="M1709.348,1339l3.84,4.22,6.258-6.878" transform="translate(-1660.491 -1.103)" fill="none" stroke="#4daf82" stroke-width="1"/>
                                    </g>
                                </svg>
                                <p class="text-xs md:text-[11px] ml-2">毎日、新しい命の誕生に携わるやりがい。</p>
                            </div>
                        </li>
                        <li class="py-6 px-4 md:bg-white md:rounded-[10px] md:w-[31%] border-b border-[#CCC] md:border-none">
                            <div class="flex items-center">
                                <fidure><img src="/wp-content/uploads/2026/03/num04.webp" width="90" height="90"></fidure>
                                <p class="pl-4 md:pl-2 font-['Zen_Maru_Gothic'] text-2xl">年間採卵数<br><span class="text-main-pink">1,000件</span>以上</p>
                            </div>
                            <div class="flex items-center mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <g id="グループ_78" data-name="グループ 78" transform="translate(-44 -1328)">
                                        <g id="楕円形_5" data-name="楕円形 5" transform="translate(44 1328)" fill="none" stroke="#4daf82" stroke-width="1">
                                        <circle cx="10" cy="10" r="10" stroke="none"/>
                                        <circle cx="10" cy="10" r="9.5" fill="none"/>
                                        </g>
                                        <path id="パス_3" data-name="パス 3" d="M1709.348,1339l3.84,4.22,6.258-6.878" transform="translate(-1660.491 -1.103)" fill="none" stroke="#4daf82" stroke-width="1"/>
                                    </g>
                                </svg>
                                <p class="text-xs md:text-[11px] ml-2">多くの症例から学べる、成長できる環境。</p>
                            </div>
                        </li>
                        <li class="py-6 px-4 md:bg-white md:rounded-[10px] md:w-[31%]">
                            <div class="flex items-center">
                                <fidure><img src="/wp-content/uploads/2026/03/num05.webp" width="90" height="90"></fidure>
                                <p class="pl-4 md:pl-2 font-['Zen_Maru_Gothic'] text-2xl">生殖医学会<br><span class="text-main-pink">認定研修施設</span></p>
                            </div>
                            <div class="flex items-center mt-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                    <g id="グループ_78" data-name="グループ 78" transform="translate(-44 -1328)">
                                        <g id="楕円形_5" data-name="楕円形 5" transform="translate(44 1328)" fill="none" stroke="#4daf82" stroke-width="1">
                                        <circle cx="10" cy="10" r="10" stroke="none"/>
                                        <circle cx="10" cy="10" r="9.5" fill="none"/>
                                        </g>
                                        <path id="パス_3" data-name="パス 3" d="M1709.348,1339l3.84,4.22,6.258-6.878" transform="translate(-1660.491 -1.103)" fill="none" stroke="#4daf82" stroke-width="1"/>
                                    </g>
                                </svg>
                                <p class="text-xs md:text-[11px] ml-2">日本生殖医学会が認定する育成する施設です。</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="py-16 md:py-12">
            <div class="content-inner">
                <div class="text-center">
                    <!-- PC -->
                    <h2 class="hidden md:inline-block font-['Zen_Maru_Gothic'] text-2xl font-medium border-b-2 border-main-pink pb-1">
                        私たちが追求する「3つのこと」
                    </h2>
                    <!-- SP -->
                    <h2 class="md:hidden font-['Zen_Maru_Gothic'] text-2xl font-medium leading-[1.8]">
                        <span class="inline-block border-b-2 border-main-pink leading-[1.2]">私たちが追求する</span><br>
                        <span class="inline-block border-b-2 border-main-pink leading-[1.2]">「3つのこと」</span>
                    </h2>
                </div>
                <ul class="flex flex-wrap justify-center gap-6 mt-8 px-4 md:px-0">
                    <li class="w-full md:w-[30%]">
                        <p class="text-center font-['Zen_Maru_Gothic'] text-2xl bg-main-pink02 border-main-pink border-1 py-2 rounded-[10px]">実績と信頼</p>
                        <div class="mt-4"><img src="/wp-content/uploads/2026/03/pursuit01.webp" loading="lazy" width="335" height="158" class="mx-auto"></div>
                        <p class="text-sm mt-4">
                            不妊治療の黎明期から積み重ねてきた豊富な経験と実績。その歴史の中で培われた信頼を土台に、これからもより良い医療を追求していきます。
                        </p>
                    </li>
                    <li class="w-full md:w-[30%]">
                        <p class="text-center font-['Zen_Maru_Gothic'] text-2xl bg-main-pink02 border-main-pink border-1 py-2 rounded-[10px]">第二創業期</p>
                        <div class="mt-4"><img src="/wp-content/uploads/2026/03/pursuit02.webp" loading="lazy" width="335" height="158" class="mx-auto"></div>
                        <p class="text-sm mt-4">
                            積み重ねてきた歴史を土台に、「今」から「未来」に向けて大きく進化する時。第二創業期として、体制・技術・人材育成を刷新し、次の成長段階へと歩みを進めています。
                        </p>
                    </li>
                    <li class="w-full md:w-[30%]">
                        <p class="text-center font-['Zen_Maru_Gothic'] text-2xl bg-main-pink02 border-main-pink border-1 py-2 rounded-[10px]">成長と報酬</p>
                        <div class="mt-4"><img src="/wp-content/uploads/2026/03/pursuit03.webp" loading="lazy" width="335" height="158" class="mx-auto"></div>
                        <p class="text-sm mt-4">
                            従業員にとっての成長機会を最大化するとともに、成果に応える報酬機会を整えています。職員の成長が連動する、「物心両面」での充実を追求します。
                        </p>
                    </li>
                </ul>
                <div class="px-4">
                    <div x-data="{
                        current: 0,
                        animated: true,
                        images: [
                            '/wp-content/uploads/2026/03/slide01.webp',
                            '/wp-content/uploads/2026/03/slide02.webp',
                            '/wp-content/uploads/2026/03/slide03.webp',
                            '/wp-content/uploads/2026/03/slide04.webp',
                            '/wp-content/uploads/2026/03/slide05.webp',
                            '/wp-content/uploads/2026/03/slide06.webp',
                            '/wp-content/uploads/2026/03/slide07.webp',
                            '/wp-content/uploads/2026/03/slide08.webp',
                        ],
                        get slideWidth() {
                            return window.innerWidth >= 768 ? 100 / 3 : 100
                        },
                        get allImages() {
                            return [...this.images, ...this.images.slice(0, 3)]
                        },
                        init() {
                            setInterval(() => {
                                this.current++
                                if (this.current >= this.images.length) {
                                    setTimeout(() => {
                                        this.animated = false
                                        this.current = 0
                                        setTimeout(() => this.animated = true, 50)
                                    }, 700)
                                }
                            }, 3000)
                        }
                    }" class="relative overflow-hidden mt-16 md:hidden">

                        <!-- スライド -->
                        <div class="flex"
                            :class="animated ? 'transition-transform duration-700' : ''"
                            :style="`transform: translateX(-${current * slideWidth}%)`">
                            <template x-for="(img, index) in allImages" :key="index">
                                <div class="w-full flex-shrink-0 md:w-1/3">
                                    <img :src="img" loading="lazy" class="w-full h-[130px] object-cover">
                                </div>
                            </template>
                        </div>
                        <!-- ドット -->
                        <!-- <div class="absolute bottom-[10%] left-1/2 -translate-x-1/2 flex gap-2">
                            <template x-for="(img, index) in images" :key="index">
                                <button
                                    @click="current = index"
                                    :class="current === index ? 'bg-[#EBA3A3]' : 'bg-white'"
                                    class="w-2 h-2 rounded-full">
                                </button>
                            </template>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
        <section class="py-12 bg-main-pink02">
            <div class="content-inner">
                <div class="text-center">
                    <h2 class="text-center font-['Zen_Maru_Gothic'] text-2xl border-b-2 border-main-pink pb-1 inline-block font-midium">院長メッセージ</h2>
                </div>
                <p class="text-sm py-4 text-center">院長　高橋 敬一</p>
                <div class="mt-4 md:mt-8 md:flex md:justify-between gap-6">
                    <div class="md:w-[40%]">
                        <div x-data="{
                            current: 1,
                            animated: true,
                            images: [
                                '/wp-content/uploads/2026/03/message01.webp',
                                '/wp-content/uploads/2026/03/message02.webp',
                                '/wp-content/uploads/2026/03/message03.webp',
                                '/wp-content/uploads/2026/03/message04.webp',
                            ],
                            get allImages() {
                                return [this.images[this.images.length - 1], ...this.images, this.images[0]]
                            },
                            init() {
                                setInterval(() => {
                                    this.current++
                                    if (this.current >= this.allImages.length - 1) {
                                        setTimeout(() => {
                                            this.animated = false
                                            this.current = 1
                                            setTimeout(() => this.animated = true, 50)
                                        }, 700)
                                    }
                                }, 3000)
                            }
                        }" class="relative overflow-hidden">
                            <div class="flex"
                                :class="animated ? 'transition-transform duration-700' : ''"
                                :style="`transform: translateX(-${current * 100}%)`">
                                <template x-for="(img, index) in allImages" :key="index">
                                    <div class="w-full flex-shrink-0">
                                        <img :src="img" loading="lazy" class="w-full">
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 mt-8 md:mt-0 md:px-0 md:w-[60%]">
                        <p class="leading-[1.6] text-sm">
                            1999年、誰もいない待合室で私は誓いました。「どこよりも誠実な医療を、この場所から届ける」と。
                        </p>
                        <p class="leading-[1.6] text-sm mt-4 md:mt-0">
                            これから共に働く仲間の皆さんには、私が築き上げた27年の信頼を、存分に使い倒してほしいと考えています。<br>
                            私が求めるのは、命と仲間に誠実であり、自ら未来を切り拓こうとする強い「意志」です。

                        </p>
                        <p class="leading-[1.6] text-sm mt-4 md:mt-0">
                            高橋ウイメンズクリニックの新しい歴史を、私と共に創り上げましょう。<br>
                            そんな熱い志を持った方と出会えることを、心から待っています。
                        </p>
                        <svg xmlns="http://www.w3.org/2000/svg" width="119.596" height="35.166" viewBox="0 0 119.596 35.166" class="block ml-auto">
                            <text id="高橋_敬一" data-name="高橋 敬一" transform="matrix(0.998, -0.07, 0.07, 0.998, 60.461, 27.06)" font-size="27" font-family="DFTegakiKakuStd-W4, DFTegakiKaku Std"><tspan x="-58.495" y="0">高橋 敬一</tspan></text>
                        </svg>
                    </div>
                </div>

                <!-- PC -->
                 <div class="hidden md:block md:flex md:justify-between md:items-center gap-6 mt-10">
                    <div class="md:w-[40%] rounded-[10px] overflow-hidden bg-[#FEF2F0] border-2 border-main-pink aspect-video flex items-center justify-center">
                        <svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="30" fill="#EBA3A3" opacity="0.5"/>
                            <polygon points="24,18 24,42 45,30" fill="#EBA3A3"/>
                        </svg>
                    </div>
                    <div class="md:w-[60%]">
                        <p class="font-bold text-lg text-center">"これまでの歴史"と"これからのビジョン"<br class="md:hidden"> 高橋院長のインタビュー</p>
                        <a href="" class="text-sm border-1 border-main-pink py-3 rounded-full duration-300 bg-white block mt-6 w-[90%] md:w-[70%] mx-auto text-center">もっと院長インタビュー記事を読む</a>
                    </div>
                </div>
                <!-- SP -->
                <div class="block md:hidden mt-16 px-4">
                    <p class="font-bold text-base text-center">"これまでの歴史"と"これからのビジョン"<br class="md:hidden"> 高橋院長のインタビュー</p>
                    <div class="mt-4 rounded-[10px] overflow-hidden bg-[#FEF2F0] border-2 border-main-pink aspect-video flex items-center justify-center">
                        <svg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="30" cy="30" r="30" fill="#EBA3A3" opacity="0.5"/>
                            <polygon points="24,18 24,42 45,30" fill="#EBA3A3"/>
                        </svg>
                    </div>
                    <a href="" class="text-sm border-1 border-main-pink py-3 rounded-full duration-300 bg-white block my-6 md:my-3 w-[100%] md:w-[70%] mx-auto text-center">もっと院長インタビュー記事を読む</a>

                </div>
            </div>
        </section>
        <section class="py-12">
            <div class="content-inner">
                <div class="text-center">
                    <h2 class="text-center font-['Zen_Maru_Gothic'] text-2xl border-b-2 border-main-pink pb-1 inline-block font-midium">スタッフインタビュー</h2>
                </div>
                <div class="border-dot py-12 flex flex-col justify-between md:flex-row mx-4 md:px-0">
                    <div><img src="/wp-content/uploads/2026/03/staff01.webp" loading="lazy" width="240" height="240" class="mx-auto md:w-full"></div>
                    <div class="mt-8 md:mt-0 md:w-[70%]">
                        <p class="font-['Zen_Maru_Gothic'] text-sm text-center md:text-left">生殖医療担当医師<span class="text-main-pink text-xl ml-2">副院長　藤田先生</span></p>
                        <p class="font-['Zen_Maru_Gothic'] text-lg mt-3 text-center md:text-left">圧倒的な症例数と、院長の背中が<br class="md:hidden">教えてくれた「医師としての視座」</p>
                        <div class="mt-6 pt-4 px-5 pb-5 bg-main-pink02 rounded-[10px] relative">
                            <p class="font-['Zen_Maru_Gothic'] text-base text-main-pink">Q. 不妊治療の道に進んだきっかけは？</p>
                            <p class="font-['Zen_Maru_Gothic'] text-sm mt-3">
                                患者様の出産に立ち会った際、「産婦人科はなんて幸せな現場なんだろう」と感動したことが原点です。その後、千葉大学で初めて採卵に立ち会い、顕...
                            </p>
                            <div class="absolute bottom-0 left-0 w-full h-[170px] md:h-[55px] rounded-b-[10px] gradient-white"></div>
                            <a href="" class="btn-arrow bg-white absolute bottom-0 md:-bottom-6 right-0 text-sm border-y border-l border-main-pink py-3 rounded-l-full duration-300 block w-[70%] md:w-[50%] text-center overflow-hidden -mr-4 md:mr-0">インタビュー記事を読む</a>
                        </div>
                    </div>
                </div>
                <div class="border-dot py-8 flex flex-col justify-between md:flex-row mx-4 md:px-0">
                    <div><img src="/wp-content/uploads/2026/03/staff02.webp" loading="lazy" width="240" height="240" class="mx-auto md:w-full"></div>
                    <div class="mt-8 md:mt-0 md:w-[70%]">
                        <p class="font-['Zen_Maru_Gothic'] text-sm text-center md:text-left">胚培養士<span class="text-main-pink text-xl ml-2">部長　岡部 美紀</span></p>
                        <p class="font-['Zen_Maru_Gothic'] text-lg mt-3 text-center md:text-left">命の誕生に一番に携わる責任。<br class="md:hidden">それを支える「風通しの良い」チーム</p>
                        <div class="mt-6 pt-4 px-5 pb-5 bg-main-pink02 rounded-[10px] relative">
                            <p class="font-['Zen_Maru_Gothic'] text-base text-main-pink">Q. 培養士としてのやりがいは？</p>
                            <p class="font-['Zen_Maru_Gothic'] text-sm mt-3">
                                命の誕生の瞬間に、世界で一番最初に立ち会える。これほど素敵な仕事はありません。もちろん、大切な命をお預かりしている責任は非常に重いですが、...
                            </p>
                            <div class="absolute bottom-0 left-0 w-full h-[170px] md:h-[55px] rounded-b-[10px] gradient-white"></div>
                            <a href="" class="btn-arrow bg-white absolute bottom-0 md:-bottom-6 right-0 text-sm border-y border-l border-main-pink py-3 rounded-l-full duration-300 block w-[70%] md:w-[50%] text-center overflow-hidden -mr-4 md:mr-0">インタビュー記事を読む</a>
                        </div>
                    </div>
                </div>
                <div class="border-dot pt-8 pb-16 mx-4 md:px-0">
                    <div class="md:pl-7">
                        <p class="font-['Zen_Maru_Gothic'] text-sm text-center">看護師<span class="text-main-pink text-xl ml-2">副主任　篠原 美希</span></p>
                        <p class="font-['Zen_Maru_Gothic'] text-lg mt-3 text-center">患者様の「一番近く」で、<br class="md:hidden">すべてのステップを喜び合える幸せ</p>
                        <div class="mt-6 pt-4 px-5 pb-5 bg-main-pink02 rounded-[10px] relative">
                            <p class="font-['Zen_Maru_Gothic'] text-base text-main-pink">Q. お仕事のやりがいを教えてください</p>
                            <p class="font-['Zen_Maru_Gothic'] text-sm mt-3">
                                より深く患者様の人生に寄り添いたいという思いから、ほぼ未経験でこの分野に飛び込みました。「赤ちゃんが欲しい」という切実な願いを持つ患者様に...
                            </p>
                            <div class="absolute bottom-0 left-0 w-full h-[170px] md:h-[55px] rounded-b-[10px] gradient-white"></div>
                            <a href="" class="btn-arrow bg-white absolute bottom-0 md:-bottom-6 right-0 text-sm border-y border-l border-main-pink py-3 rounded-l-full duration-300 block w-[70%] md:w-[50%] text-center overflow-hidden -mr-4 md:mr-0">インタビュー記事を読む</a>
                        </div>
                    </div>
                </div>
                <div class="pt-8 pb-16 mx-4 md:px-0">
                    <div class="md:pl-7">
                        <p class="font-['Zen_Maru_Gothic'] text-sm text-center">医事課<span class="text-main-pink text-xl ml-2">大野 早紀子</span></p>
                        <p class="font-['Zen_Maru_Gothic'] text-lg mt-3 text-center">圧倒的な症例数と、院長の背中が<br class="md:hidden">教えてくれた「医師としての視座」</p>
                        <div class="mt-6 pt-4 px-5 pb-5 bg-main-pink02 rounded-[10px] relative">
                            <p class="font-['Zen_Maru_Gothic'] text-base text-main-pink">Q. お仕事のやりがいを教えてください</p>
                            <p class="font-['Zen_Maru_Gothic'] text-sm mt-3">
                                より深く患者様の人生に寄り添いたいという思いから、ほぼ未経験でこの分野に飛び込みました。「赤ちゃんが欲しい」という切実な願いを持つ患者様に...
                            </p>
                            <div class="absolute bottom-0 left-0 w-full h-[170px] md:h-[55px] rounded-b-[10px] gradient-white"></div>
                            <a href="" class="btn-arrow bg-white absolute bottom-0 md:-bottom-6 right-0 text-sm border-y border-l border-main-pink py-3 rounded-l-full duration-300 block w-[70%] md:w-[50%] text-center overflow-hidden -mr-4 md:mr-0">インタビュー記事を読む</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="py-12 bg-main-pink02">
            <div class="content-inner">
                <div class="text-center">
                    <h2 class="text-center font-['Zen_Maru_Gothic'] text-2xl border-b-2 border-main-pink pb-1 inline-block font-midium">働く環境</h2>
                </div>
                <p class="content-inner pt-6 md:pt-6 text-left px-4 leading-[1.8] text-lg md:text-sm md:text-lg md:text-center md:px-0">
                    “最高の医療”は“最高のチームワーク”から、スタッフの働きやすさを追求した、<br class="hidden md:block">ドーナッツ型（循環型）の動線設計
                </p>
                <ul class="flex md:flex-wrap md:justify-center gap-6 mt-6 md:mt-8 px-4 md:px-0 overflow-x-auto md:overflow-x-visible">
                    <li class="w-[80vw] flex-shrink-0 md:w-[30%] md:flex-shrink">
                        <div class="mt-4"><img src="/wp-content/uploads/2026/03/environment01-1.webp" loading="lazy" width="277" height="188" class="mx-auto rounded-[10px]"></div>
                        <p class="text-sm mt-4">
                            迷いのない、最短の動線 中心部のスタッフエリアから、すべての診察室や処置室へダイレクトにアクセス可能。無駄な移動を最小限に抑えることで、患者様と向き合う時間を最大化しています。
                        </p>
                    </li>
                    <li class="w-[80vw] flex-shrink-0 md:w-[30%] md:flex-shrink">
                        <div class="mt-4"><img src="/wp-content/uploads/2026/03/environment02-1.webp" loading="lazy" width="277" height="188" class="mx-auto rounded-[10px]"></div>
                        <p class="text-sm mt-4">
                            部署を超えた、即座の連携 医師、看護師、胚培養士、受付。すべての職種が中心のスタッフエリアで繋がっているため、情報の共有や相談がリアルタイムで行えます。この「壁のない連携」が、安全で精度の高い医療を支えています。
                        </p>
                    </li>
                    <li class="w-[80vw] flex-shrink-0 md:w-[30%] md:flex-shrink">
                        <div class="mt-4"><img src="/wp-content/uploads/2026/03/environment03-1.webp" loading="lazy" width="277" height="188" class="mx-auto rounded-[10px]"></div>
                        <p class="text-sm mt-4">
                            患者様を「待たせない」配慮 患者様とスタッフの動線が完全に分離されているため、混雑時でもスムーズな誘導が可能。スタッフ側も、患者様のプライバシーを尊重しながら、テキパキと効率的に業務を進めることができます。
                        </p>
                    </li>
                </ul>
            </div>
        </section>
        <section class="py-12">
            <div class="content-inner">
                <div class="overflow-x-auto">
                    <div class="flex flex-wrap justify-between w-[800px] md:w-full">
                        <div class="w-[25%] p-2 mb-0"><img src="/wp-content/uploads/2026/03/image01-1.webp" loading="lazy" class="w-full mx-auto rounded-[10px]" width="165" height="160"></div>
                        <div class="w-[25%] p-2 mb-0"><img src="/wp-content/uploads/2026/03/image02-1.webp" loading="lazy" class="w-full mx-auto rounded-[10px]" width="165" height="160"></div>
                        <div class="w-[25%] p-2 mb-0"><img src="/wp-content/uploads/2026/03/image03-1.webp" loading="lazy" class="w-full mx-auto rounded-[10px]" width="165" height="160"></div>
                        <div class="w-[25%] p-2 mb-0"><img src="/wp-content/uploads/2026/03/image04-1.webp" loading="lazy" class="w-full mx-auto rounded-[10px]" width="165" height="160"></div>
                        <div class="w-[25%] p-2 mb-0"><img src="/wp-content/uploads/2026/03/image05-1.webp" loading="lazy" class="w-full mx-auto rounded-[10px]" width="165" height="160"></div>
                        <div class="w-[25%] p-2 mb-0"><img src="/wp-content/uploads/2026/03/image06-1.webp" loading="lazy" class="w-full mx-auto rounded-[10px]" width="165" height="160"></div>
                        <div class="w-[25%] p-2 mb-0"><img src="/wp-content/uploads/2026/03/image07-1.webp" loading="lazy" class="w-full mx-auto rounded-[10px]" width="165" height="160"></div>
                        <div class="w-[25%] p-2 mb-0"><img src="/wp-content/uploads/2026/03/image08-1.webp" loading="lazy" class="w-full mx-auto rounded-[10px]" width="165" height="160"></div>
                        <div class="w-[25%] p-2 mb-0"><img src="/wp-content/uploads/2026/03/image09-1.webp" loading="lazy" class="w-full mx-auto rounded-[10px]" width="165" height="160"></div>
                        <div class="w-[25%] p-2 mb-0"><img src="/wp-content/uploads/2026/03/image10-1.webp" loading="lazy" class="w-full mx-auto rounded-[10px]" width="165" height="160"></div>
                        <div class="w-[25%] p-2 mb-0"><img src="/wp-content/uploads/2026/03/image11-1.webp" loading="lazy" class="w-full mx-auto rounded-[10px]" width="165" height="160"></div>
                        <div class="w-[25%] p-2 mb-0"><img src="/wp-content/uploads/2026/03/image12-1.webp" loading="lazy" class="w-full mx-auto rounded-[10px]" width="165" height="160"></div>
                    </div>
                </div>
                <div class="text-center mt-16">
                    <h2 class="text-center font-['Zen_Maru_Gothic'] text-2xl border-b-2 border-main-pink pb-1 inline-block font-midium">教育・研修プログラム</h2>
                </div>
                <p class="content-inner py-8 md:py-12 text-left px-4 leading-[1.8] text-sm md:text-lg md:text-center md:px-0">
                    私たちは、スタッフ一人ひとりが長期的にキャリアを築けるよう、継続的な教育と自己成長を全面的に支援します。<br>
                    定期的なフォローアップ研修や資格取得支援など、働きながらスキルアップできる環境を整えています。
                </p>
                <ul class="px-4 md:px-0 md:w-[60%] md:mx-auto">
                    <li class="border-2 border-main-pink rounded-[20px] p-5 mb-2">
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 50 50" class="flex-shrink-0">
                            <defs>
                                <clipPath id="clip-path-01">
                                <rect id="長方形_99" data-name="長方形 99" width="18.73" height="33.5" fill="#fff"/>
                                </clipPath>
                            </defs>
                            <g id="グループ_271" data-name="グループ 271" transform="translate(-32 -864)">
                                <circle id="楕円形_1" data-name="楕円形 1" cx="25" cy="25" r="25" transform="translate(32 864)" fill="#eba3a3"/>
                                <g id="グループ_157" data-name="グループ 157" transform="translate(61.24 870.533) rotate(45)">
                                <g id="グループ_157-2" data-name="グループ 157" clip-path="url(#clip-path-01)">
                                    <path id="パス_7" data-name="パス 7" d="M14.948,76.1,18.73,90.015,9.875,101.584,10,88.919a2.3,2.3,0,1,0-1.249-.009l-.125,12.662L0,89.832,4.055,75.994Z" transform="translate(0 -68.084)" fill="#fff"/>
                                    <path id="パス_8" data-name="パス 8" d="M51.375,43.8l.007,2.075H40.84V43.8Z" transform="translate(-36.589 -39.244)" fill="#fff"/>
                                    <rect id="長方形_98" data-name="長方形 98" width="10.542" height="3.348" transform="translate(4.251)" fill="#fff"/>
                                </g>
                                </g>
                            </g>
                            </svg>

                            <div>
                                <p class="font-bold text-lg">入職時研修</p>
                                <p class="text-sm mt-2">医療現場の基礎知識とクリニックの理念を学び、安心して業務を開始できます。</p>
                            </div>
                        </div>
                    </li>

                    <div class="text-center text-main-pink my-2">
                        <span style="display: inline-block; transform: scaleY(0.5);">▼</span>
                    </div>

                    <li class="border-2 border-main-pink rounded-[20px] p-5 mb-2">
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 50 50" class="flex-shrink-0">
                                <defs>
                                    <clipPath id="clip-path">
                                    <rect id="長方形_100" data-name="長方形 100" width="25.15" height="34.532" fill="#fff"/>
                                    </clipPath>
                                </defs>
                                <g id="グループ_272" data-name="グループ 272" transform="translate(-32 -902)">
                                    <circle id="楕円形_1" data-name="楕円形 1" cx="25" cy="25" r="25" transform="translate(32 902)" fill="#eba3a3"/>
                                    <g id="グループ_160" data-name="グループ 160" transform="translate(44.425 909.734)">
                                    <g id="グループ_158" data-name="グループ 158" clip-path="url(#clip-path)">
                                        <path id="パス_9" data-name="パス 9" d="M52.473,39.032a8.184,8.184,0,1,0,0,16.367c.214,0,.436-.008.662-.025a8.185,8.185,0,0,0-.662-16.343m4.793,6.021-5.484,5.688a.6.6,0,0,1-.428.182h0a.593.593,0,0,1-.429-.188l-2.975-3.171a.6.6,0,0,1,.868-.814l2.547,2.715,5.049-5.237a.594.594,0,0,1,.841-.016.6.6,0,0,1,.016.841" transform="translate(-39.897 -35.161)" fill="#fff"/>
                                        <path id="パス_10" data-name="パス 10" d="M34.474,228.555l-.209.86-2.1,8.6L29.5,234.972a.6.6,0,0,0-.448-.2.606.606,0,0,0-.22.042l-3.711,1.481,2.538-10.4a2.994,2.994,0,0,1,.476.274,5.594,5.594,0,0,1,.989,1.074,4.537,4.537,0,0,0,2.011,1.724,4.4,4.4,0,0,0,2.565-.206c.268-.075.522-.147.775-.2" transform="translate(-22.628 -203.487)" fill="#fff"/>
                                        <path id="パス_11" data-name="パス 11" d="M135.987,229.872l2.441,10-3.711-1.481a.6.6,0,0,0-.669.162l-2.664,3.046-2.065-8.462.255-1.045a10.2,10.2,0,0,1,1,.246,4.419,4.419,0,0,0,2.568.207,4.524,4.524,0,0,0,2.008-1.724,6.914,6.914,0,0,1,.838-.953" transform="translate(-116.493 -207.072)" fill="#fff"/>
                                        <path id="パス_12" data-name="パス 12" d="M23.451,8.521c-.394-1.211.031-2.851-.7-3.858S20.313,3.545,19.294,2.8,17.674.485,16.463.093c-1.169-.379-2.592.53-3.887.53S9.857-.286,8.69.093C7.479.485,6.864,2.071,5.856,2.8S3.142,3.644,2.4,4.663,2.093,7.31,1.7,8.521C1.32,9.691,0,10.761,0,12.055s1.32,2.366,1.7,3.535c.394,1.209-.031,2.849.7,3.858a3.466,3.466,0,0,0,1.657,1.044.594.594,0,0,1,.766-.351,5.809,5.809,0,0,1,1.381.681,6.523,6.523,0,0,1,1.227,1.3,3.6,3.6,0,0,0,1.442,1.325,3.56,3.56,0,0,0,1.875-.22c.31-.087.632-.178.956-.243a4.224,4.224,0,0,1,.871-.1l.06,0h.023a7.091,7.091,0,0,1,1.745.336,3.558,3.558,0,0,0,1.877.221,3.6,3.6,0,0,0,1.439-1.324,6.525,6.525,0,0,1,1.226-1.305,4.2,4.2,0,0,1,.682-.394.6.6,0,0,1,.509,0,.586.586,0,0,1,.291.307,4.894,4.894,0,0,0,2.323-1.292c.733-1.01.308-2.647.7-3.858.379-1.169,1.7-2.24,1.7-3.535s-1.32-2.365-1.7-3.534M19.573,18.3A9.336,9.336,0,0,1,13.328,21.4c-.258.019-.51.028-.753.028a9.369,9.369,0,1,1,7-3.133" transform="translate(0 0)" fill="#fff"/>
                                        <path id="パス_13" data-name="パス 13" d="M135.1,205.477a.586.586,0,0,1,.291.307c-.187.071-.372.147-.548.229a3.518,3.518,0,0,0-.583.335c-1.008.733-1.621,2.319-2.832,2.714-.978.316-2.135-.27-3.245-.468a.6.6,0,0,0-.529-.654l-.031,0a7.092,7.092,0,0,1,1.745.336,3.558,3.558,0,0,0,1.877.221,3.6,3.6,0,0,0,1.439-1.324,6.525,6.525,0,0,1,1.226-1.305,4.2,4.2,0,0,1,.682-.394.6.6,0,0,1,.509,0" transform="translate(-114.962 -185.044)" fill="#fff"/>
                                        <path id="パス_14" data-name="パス 14" d="M122.1,231.074a.593.593,0,0,1,.105.4,3.683,3.683,0,0,0-.592-.061.406.406,0,0,0-.05,0,3.462,3.462,0,0,0-.575.052l.047-.19a.6.6,0,0,1,.588-.454h.023l.031,0a.6.6,0,0,1,.424.25" transform="translate(-108.99 -207.927)" fill="#fff"/>
                                        <path id="パス_15" data-name="パス 15" d="M49.519,205.485H49.5a.6.6,0,0,0-.588.454l-.047.19c-.06.01-.119.022-.179.034-1.076.215-2.188.753-3.132.446-1.211-.395-1.826-1.981-2.834-2.714a5.185,5.185,0,0,0-1.24-.606c-.185-.069-.373-.137-.557-.206a.594.594,0,0,1,.766-.351,5.809,5.809,0,0,1,1.381.681,6.524,6.524,0,0,1,1.227,1.3,3.6,3.6,0,0,0,1.442,1.325,3.56,3.56,0,0,0,1.875-.22c.31-.087.632-.178.956-.243a4.224,4.224,0,0,1,.871-.1c.029,0,.056,0,.082,0" transform="translate(-36.861 -182.59)" fill="#fff"/>
                                        <path id="パス_16" data-name="パス 16" d="M89.156,89.921a.587.587,0,0,0-.182-.416.594.594,0,0,0-.841.016l-5.049,5.237-2.547-2.715a.594.594,0,0,0-.841-.027.587.587,0,0,0-.187.421.595.595,0,0,1,1.029-.42l2.547,2.716L88.134,89.5a.595.595,0,0,1,1.023.426" transform="translate(-71.622 -80.455)" fill="#fff"/>
                                    </g>
                                    </g>
                                </g>
                            </svg>

                            <div>
                                <p class="font-bold text-lg">専門スキル研修</p>
                                <p class="text-sm mt-2">診療科目に応じた専門技術や知識の習得を目指し、実践的な研修を実施します。</p>
                                <div class="mt-3 py-3 px-4 bg-main-pink02 rounded-[10px]">
                                    <p class="text-sm">生殖補助医療（ART)、日帰り子宮鏡下手術、卵管鏡下卵管形成術、など、幅広い選択肢を示せる研修・診療をおこないます。</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <div class="text-center text-main-pink my-2">
                        <span style="display: inline-block; transform: scaleY(0.5);">▼</span>
                    </div>

                    <li class="border-2 border-main-pink rounded-[20px] p-5 mb-2">
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50" height="50" viewBox="0 0 50 50" class="flex-shrink-0">
                                <defs>
                                    <clipPath id="clip-path">
                                    <rect id="長方形_102" data-name="長方形 102" width="30.927" height="31.667" fill="#fff"/>
                                    </clipPath>
                                </defs>
                                <g id="グループ_273" data-name="グループ 273" transform="translate(-32 -864)">
                                    <circle id="楕円形_1" data-name="楕円形 1" cx="25" cy="25" r="25" transform="translate(32 864)" fill="#eba3a3"/>
                                    <g id="グループ_162" data-name="グループ 162" transform="translate(41.536 873.167)">
                                    <g id="グループ_161" data-name="グループ 161" clip-path="url(#clip-path)">
                                        <path id="パス_21" data-name="パス 21" d="M233.415,384.2l-1.615-.532-.136-.495a2.814,2.814,0,0,0,1.66-2.448,3.015,3.015,0,0,0-3.012-3.012h-.4a3.015,3.015,0,0,0-3.012,3.012,2.788,2.788,0,0,0,1.61,2.456l-.1.47c-.157.059-.55.2-1.737.544a.356.356,0,0,0-.244.438l1.436,5.154a.356.356,0,0,0,.343.261h3.754a.356.356,0,0,0,.345-.267l1.339-5.154a.356.356,0,0,0-.233-.428" transform="translate(-214.83 -358.386)" fill="#fff"/>
                                        <path id="パス_22" data-name="パス 22" d="M11.577,388.393c-.38-1.472-.59-2.283-1.284-2.512-1.17-.386-2.078-.68-2.45-.8l-.136-.494a2.814,2.814,0,0,0,1.66-2.448,3.015,3.015,0,0,0-3.012-3.012h-.4a3.015,3.015,0,0,0-3.012,3.012,2.788,2.788,0,0,0,1.61,2.456l-.107.519c-.374.134-1.182.4-2.416.762-.79.228-1.194,1.677-1.764,4.036-.087.362-.17.7-.255,1.034a.356.356,0,0,0,.345.445h11.6a.356.356,0,0,0,.339-.465c-.321-1-.541-1.851-.717-2.533" transform="translate(0 -359.724)" fill="#fff"/>
                                        <path id="パス_23" data-name="パス 23" d="M368.908,390.927c-.321-1-.541-1.851-.717-2.533-.38-1.472-.59-2.283-1.284-2.512-1.17-.386-2.078-.68-2.45-.8l-.136-.494a2.814,2.814,0,0,0,1.66-2.448,3.015,3.015,0,0,0-3.012-3.012h-.4a3.015,3.015,0,0,0-3.012,3.012,2.788,2.788,0,0,0,1.61,2.456l-.107.519c-.374.134-1.182.4-2.417.762-.79.228-1.194,1.677-1.764,4.036-.087.362-.17.7-.255,1.034a.356.356,0,0,0,.345.445h11.6a.356.356,0,0,0,.339-.465" transform="translate(-338.361 -359.724)" fill="#fff"/>
                                        <path id="パス_24" data-name="パス 24" d="M462.611,103.634a2.548,2.548,0,1,0,2.548-2.548,2.548,2.548,0,0,0-2.548,2.548" transform="translate(-438.933 -95.912)" fill="#fff"/>
                                        <path id="パス_25" data-name="パス 25" d="M53.229,16.767l-1.673-2.237-.161-.222a3.014,3.014,0,0,1-.605-2.127,2.632,2.632,0,0,1,2.54-2.21,2.718,2.718,0,0,1,2.026.989,3.5,3.5,0,0,1,1.3-.862,4.141,4.141,0,0,1,4.329-6.413V0H35.648V17.417l18.171-.059a2.764,2.764,0,0,1-.59-.591m-4.142-6.611L47.06,8.129c-1,1.476-2.238,3.3-2.377,3.542a.8.8,0,0,1-.583.417.844.844,0,0,1-.131.01,1.825,1.825,0,0,1-1.091-.6c-.277-.237-.636-.567-1.068-.982-.726-.7-1.4-1.387-1.43-1.416a.768.768,0,1,1,1.1-1.074c.789.806,1.725,1.716,2.3,2.221.634-.959,1.776-2.637,2.537-3.752a.768.768,0,0,1,1.177-.11l2.165,2.165,5.15-4.676a.768.768,0,0,1,1.032,1.137l-5.692,5.168a.768.768,0,0,1-1.059-.025" transform="translate(-33.823)" fill="#fff"/>
                                        <path id="パス_26" data-name="パス 26" d="M372.693,224.112h-4.93a1.923,1.923,0,0,0-1.517.744l-.314.421-.742.99-.874-1.215-.163-.229s-.655-1.035-1.506-.419c-.874.632-.107,1.591-.107,1.591l.167.23,1.672,2.236a1.191,1.191,0,0,0,.912.493l.266-.018a1.179,1.179,0,0,0,.836-.614l.4-.6v1.562l5.391.019v-2.128a.356.356,0,1,1,.712,0V229.3l1.714.006v-3.274a1.93,1.93,0,0,0-1.924-1.924" transform="translate(-343.69 -212.641)" fill="#fff"/>
                                    </g>
                                    </g>
                                </g>
                            </svg>

                            <div>
                                <p class="font-bold text-lg">学会・セミナー参加支援</p>
                                <p class="text-sm mt-2">最新の医療知識や技術を学ぶため、外部の学会やセミナーへの参加費を補助します。</p>
                            </div>
                        </div>
                    </li>
                </ul>
                <div x-data="{
                    current: 0,
                    animated: true,
                    images: [
                        '/wp-content/uploads/2026/03/slide01.webp',
                        '/wp-content/uploads/2026/03/slide02.webp',
                        '/wp-content/uploads/2026/03/slide03.webp',
                        '/wp-content/uploads/2026/03/slide04.webp',
                        '/wp-content/uploads/2026/03/slide05.webp',
                        '/wp-content/uploads/2026/03/slide06.webp',
                        '/wp-content/uploads/2026/03/slide07.webp',
                        '/wp-content/uploads/2026/03/slide08.webp',
                    ],
                    get slideWidth() {
                        return window.innerWidth >= 768 ? 100 / 3 : 100
                    },
                    get allImages() {
                        return [...this.images, ...this.images.slice(0, 3)]
                    },
                    init() {
                        setInterval(() => {
                            this.current++
                            if (this.current >= this.images.length) {
                                setTimeout(() => {
                                    this.animated = false
                                    this.current = 0
                                    setTimeout(() => this.animated = true, 50)
                                }, 700)
                            }
                        }, 3000)
                    }
                }" class="relative overflow-hidden mt-24">

                    <!-- スライド -->
                    <div class="flex"
                        :class="animated ? 'transition-transform duration-700' : ''"
                        :style="`transform: translateX(-${current * slideWidth}%)`">
                        <template x-for="(img, index) in allImages" :key="index">
                            <div class="w-full flex-shrink-0 md:w-1/3">
                                <img :src="img" loading="lazy" class="w-full">
                            </div>
                        </template>
                    </div>

                    <!-- ドット -->
                    <!-- <div class="absolute bottom-[10%] left-1/2 -translate-x-1/2 flex gap-2">
                        <template x-for="(img, index) in images" :key="index">
                            <button
                                @click="current = index"
                                :class="current === index ? 'bg-[#EBA3A3]' : 'bg-white'"
                                class="w-2 h-2 rounded-full">
                            </button>
                        </template>
                    </div> -->
                </div>

                <ul class="px-4 md:px-0 flex flex-col md:flex-row gap-4 mt-16">
                    <li class="border-2 border-main-pink rounded-[10px] p-3 md:w-1/2">
                        <p class="text-2xl font-['Zen_Maru_Gothic'] text-main-pink text-center after:content-['▼'] after:ml-3 after:text-[8px] after:relative after:top-[-4px]">カジュアル面談</p>
                        <p class="text-sm text-center mt-2">エントリー前にクリニックについて<br>より詳しく知りたい方はお気軽に応募ください。</p>
                    </li>
                    <li class="border-2 border-main-pink rounded-[10px] p-3 md:w-1/2">
                        <p class="text-2xl font-['Zen_Maru_Gothic'] text-main-pink text-center after:content-['▼'] after:ml-3 after:text-[8px] after:relative after:top-[-4px]">応募はこちらから</p>
                        <p class="text-sm text-center mt-2">こちらのフォームからご応募ください。</p>
                    </li>
                </ul>
            </div>
        </section>
    </section>
</main>
<?php get_footer(); ?>