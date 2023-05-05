<x-layout>

    <main class="flex bg-[#e9ecf1]  flex-col justify-center items-center w-screen h-screen">
        {{-- <background class="fixed w-screen h-screen inset-0 pointer-events-none -z-50">
            <img src="{{ asset('image/auth/login.webp') }}" class="object-cover w-screen h-screen blur opacity-60 ">
        </background> --}}

        <inside
            class="flex justify-between items-center w-[1100px] h-[660px] relative overflow-hidden  px-[25px] rounded-[28px] bg-white">

            <left class="flex w-full   justify-center">
                <div class="w-max flex flex-col gap-6 ">

                    <p class="text-[100px] leading-[1]   font-bold  tracking-tight   text-black">
                        <span class="block text-[40px]">Welcome to</span>
                        <span class="text-[#8f66ba]">
                            FunnyBox
                        </span>
                    </p>
                    <p class="text-xl tracking-[-0.01] w-[380px] text-left text-black">
                        where children can explore the excitement of strategic battles
                        while learning important skills! Join us now and start your adventure in a world full of
                        laughter and education.
                    </p>


                    <buttonsec>
                        <svg class="btnsvg"xmlns="http://www.w3.org/2000/svg" version="1.1">
                            <defs>
                                <filter id="gooey">
                                    <!-- in="sourceGraphic" -->
                                    <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur" />
                                    <feColorMatrix in="blur" type="matrix"
                                        values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9"
                                        result="highContrastGraphic" />
                                    <feComposite in="SourceGraphic" in2="highContrastGraphic" operator="atop" />
                                </filter>
                            </defs>
                        </svg>

                        <button id="gooey-button" class="!rounded-full mt-8  text-xl flex items-center gap-3 !px-8 !text-white">
                            Explore Funny world 
                            <span>
                                <img src="{{asset("image/auth/hand.png")}}" class="w-8">
                            </span>
                            <span class="bubbles">
                                <span class="bubble"></span>
                                <span class="bubble"></span>
                                <span class="bubble"></span>
                                <span class="bubble"></span>
                                <span class="bubble"></span>
                                <span class="bubble"></span>
                                <span class="bubble"></span>
                                <span class="bubble"></span>
                                <span class="bubble"></span>
                                <span class="bubble"></span>
                            </span>
                        </button>


                    </buttonsec>




                </div>

            </left>
            <right class="w-max flex-shrink-0 grow-0">
                <img src="{{ asset('image/auth/2.png') }}" class="rounded-[14px] h-[610px] w-full object-cover">
            </right>
        </inside>
    </main>

    <script src="{{ asset('libs/js/web3-provider@1.7.1.minjs.js') }}"></script>
    <script>
        const connectWalletButton = document.getElementById('gooey-button');
        let provider;

        async function connectWallet() {
            provider = new WalletConnectProvider.default({
                rpc: {
                    1: 'https://mainnet.infura.io/v3/ac7a761469dc4094b909e049bc289f4e',
                },
            });

            await provider.enable();
            const accounts = await provider.send('eth_accounts');
            const wallet = accounts[0];
            console.log(wallet)
            checkWalletConnect();
        }

        async function checkWalletConnect() {
            provider = new WalletConnectProvider.default({
                qrcode: false,
                rpc: {
                    1: 'https://mainnet.infura.io/v3/ac7a761469dc4094b909e049bc289f4e',
                },
            });

            await provider.enable();

            // Check if WalletConnect has an existing session
            if (provider.wc.session) {
                const accounts = await provider.send('eth_accounts');
                const wallet = accounts[0];
                console.log(wallet)
                // Perform login or registration using the wallet address
                window.location.href = `/auth/register?wallet=${wallet}`;
            }
        }


        // Check WalletConnect status when the page loads
        checkWalletConnect();

        connectWalletButton.addEventListener('click', connectWallet);
    </script>
</x-layout>
