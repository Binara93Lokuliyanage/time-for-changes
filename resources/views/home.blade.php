<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
<div id="confirmAdd" class="modal">
    <div class="modal-content">
        <div class = "closeIcon" onclick="closeSubs();"><i class="fa fa-times" aria-hidden="true"></i></div>
        <h3>නවතම කතා පැමිණි සැනින් දැනගන්න. <br> Time for Changes වෙබ් පිටුව Subscribe කරන්න</h3>

        <form action="subscribe" method="POST">
        @csrf
        <p>ඔබේ නම</p>
        <input type="text" name="name" placeholder="Your Name" minlength="3" maxlength="50" required><br>
        <span style="color: red">@error('name'){{$message}}@enderror</span><br>

        <p>E-mail ලිපිනය</p>
        <input type="email" name="email" placeholder="Your Email" required><br>
        <span style="color: red">@error('email'){{$message}}@enderror</span><br>

        <p>උපන් දිනය</p>
        <input type="date" name="birth_date" placeholder="Birth Day" min="1922-01-01" max="2019-12-31" required><br>
        <span style="color: red">@error('birth_date'){{$message}}@enderror</span><br>

        <button type = "submit" class="subscribeButton" class="button">Subscribe</button>
    </form>
    </div> 
</div>

    <div class="mainContainer">
        <div class="commonContainer" id="topContainer">
            @include('header')
            <div class="storyArea">
                
            <h2>නවතම කතන්දර</h2>
                <!-- <div id="slider" class="slider">
                    <div class="slider-content">
                        <div class="slider-content-wrapper">
                            @foreach($collection as $col)
                            <div class="slider-content__item image-1">"{{$col['discription']}}"
                            <div class = "button" id = "readBtn"><a href="{{'fullStory/'.$col['id']}}">කියවන්න</a></div>
                            </div>
                            
                            @endforeach
                        </div>
                    </div>
                </div> -->
                <!-- Slideshow container -->
<div class="slideshow-container">

<!-- Full-width images with number and caption text -->

@foreach($collection as $col)
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <div class="text">" {{$col['discription']}} "</div>
  <div class = "button" id = "readBtn"><a href="{{'fullStory/'.$col['id']}}">කියවන්න</a></div>
</div>
@endforeach

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

            </div>
            <div class="headingArea">
                Time for<br><strong style="font-size: 100px;">Changes</strong>
            </div>
            <div class="imageArea" id="imageArea">
                <img src="images/main.png" style="max-width: 100%; max-height: 100%;object-fit: contain; position: absolute; 
            bottom: 0; ">
            </div>

        </div>
    </div>
</body>
<script>
    function setWindowSize() {
        const windowHeight = window.innerHeight;
        document.getElementById('topContainer').style.height = windowHeight + "px";
        document.getElementById('imageArea').style.height = ((windowHeight / 4) * 3) + "px";
    }

    window.onresize = setWindowSize;
    window.onload = setWindowSize;

    const slider = (function() {

        //const
        const slider = document.getElementById("slider"); // основная обертка
        console.log(slider);
        const sliderContent = document.querySelector(".slider-content"); // обертка для контейнера слайдов и контролов
        console.log(sliderContent);
        const sliderWrapper = document.querySelector(".slider-content-wrapper"); // контейнер для слайдов
        const elements = document.querySelectorAll(".slider-content__item"); // обертка для слайда
        const sliderContentControls = createHTMLElement("div", "slider-content__controls"); // блок контролов внутри sliderContent
        let dotsWrapper = null; // Обертка dots
        let prevButton = null; // Кнопки
        let nextButton = null;
        let autoButton = null;
        let leftArrow = null; // Стрелки
        let rightArrow = null;
        let intervalId = null; //идентификатор setInterval

        // data
        const itemsInfo = {
            offset: 0, // смещение контейнера со слайдами относительно начальной точки (первый слайд)
            position: {
                current: 0, // номер текущего слайда
                min: 0, // первый слайд
                max: elements.length - 1 // последний слайд	
            },
            intervalSpeed: 2000, // Скорость смены слайдов в авторежиме

            update: function(value) {
                this.position.current = value;
                this.offset = -value;
            },
            reset: function() {
                this.position.current = 0;
                this.offset = 0;
            }
        };

        const controlsInfo = {
            buttonsEnabled: false,
            dotsEnabled: false,
            prevButtonDisabled: true,
            nextButtonDisabled: false
        };

        // Инициализация слайдера
        function init(props) {
            // let {buttonsEnabled, dotsEnabled} = controlsInfo;
            let {
                intervalSpeed,
                position,
                offset
            } = itemsInfo;

            // Проверка наличия элементов разметки
            if (slider && sliderContent && sliderWrapper && elements) {
                // Проверка входных параметров
                if (props && props.intervalSpeed) {
                    intervalSpeed = props.intervalSpeed;
                }
                if (props && props.currentItem) {
                    if (parseInt(props.currentItem) >= position.min && parseInt(props.currentItem) <= position.max) {
                        position.current = props.currentItem;
                        offset = -props.currentItem;
                    }
                }
                if (props && props.buttons) {
                    controlsInfo.buttonsEnabled = true;
                }
                if (props && props.dots) {
                    controlsInfo.dotsEnabled = true;
                }

                _updateControlsInfo();
                _createControls(controlsInfo.dotsEnabled, controlsInfo.buttonsEnabled);
                _render();
            } else {
                console.log("Разметка слайдера задана неверно. Проверьте наличие всех необходимых классов 'slider/slider-content/slider-wrapper/slider-content__item'");
            }
        }

        // Обновить свойства контролов
        function _updateControlsInfo() {
            const {
                current,
                min,
                max
            } = itemsInfo.position;
            controlsInfo.prevButtonDisabled = current > min ? false : true;
            controlsInfo.nextButtonDisabled = current < max ? false : true;
        }

        // Создание элементов разметки
        function _createControls(dots = false, buttons = false) {

            //Обертка для контролов
            sliderContent.append(sliderContentControls);

            // Контролы
            createArrows();
            buttons ? createButtons() : null;
            dots ? createDots() : null;

            // Arrows function
            function createArrows() {
                const dValueLeftArrow = "M31.7 239l136-136c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9L127.9 256l96.4 96.4c9.4 9.4 9.4 24.6 0 33.9L201.7 409c-9.4 9.4-24.6 9.4-33.9 0l-136-136c-9.5-9.4-9.5-24.6-.1-34z";
                const dValueRightArrow = "M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z";
                const leftArrowSVG = createSVG(dValueLeftArrow);
                const rightArrowSVG = createSVG(dValueRightArrow);

                leftArrow = createHTMLElement("div", "prev-arrow");
                leftArrow.append(leftArrowSVG);
                leftArrow.addEventListener("click", () => updateItemsInfo(itemsInfo.position.current - 1))

                rightArrow = createHTMLElement("div", "next-arrow");
                rightArrow.append(rightArrowSVG);
                rightArrow.addEventListener("click", () => updateItemsInfo(itemsInfo.position.current + 1))

                sliderContentControls.append(leftArrow, rightArrow);

                // SVG function
                function createSVG(dValue, color = "currentColor") {
                    const svg = document.createElementNS("http://www.w3.org/2000/svg", "svg");
                    svg.setAttribute("viewBox", "0 0 256 512");
                    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
                    path.setAttribute("fill", color);
                    path.setAttribute("d", dValue);
                    svg.appendChild(path);
                    return svg;
                }
            }

            // Dots function
            function createDots() {
                dotsWrapper = createHTMLElement("div", "dots");
                for (let i = 0; i < itemsInfo.position.max + 1; i++) {
                    const dot = document.createElement("div");
                    dot.className = "dot";
                    dot.addEventListener("click", function() {
                        updateItemsInfo(i);
                    })
                    dotsWrapper.append(dot);
                }
                sliderContentControls.append(dotsWrapper);
            }

            // Buttons function
            function createButtons() {
                const controlsWrapper = createHTMLElement("div", "slider-controls");
                prevButton = createHTMLElement("button", "prev-control", "Prev");
                prevButton.addEventListener("click", () => updateItemsInfo(itemsInfo.position.current - 1))

                autoButton = createHTMLElement("button", "auto-control", "Auto");
                autoButton.addEventListener("click", () => {
                    intervalId = setInterval(function() {
                        if (itemsInfo.position.current < itemsInfo.position.max) {
                            itemsInfo.update(itemsInfo.position.current + 1);
                        } else {
                            itemsInfo.reset();
                        }
                        _slideItem();
                    }, itemsInfo.intervalSpeed)
                })

                nextButton = createHTMLElement("button", "next-control", "Next");
                nextButton.addEventListener("click", () => updateItemsInfo(itemsInfo.position.current + 1))

                controlsWrapper.append(prevButton, autoButton, nextButton);
                slider.append(controlsWrapper);
            }
        }

        // Задать класс для контролов (buttons, arrows)
        function setClass(options) {
            if (options) {
                options.forEach(({
                    element,
                    className,
                    disabled
                }) => {
                    if (element) {
                        disabled ? element.classList.add(className) : element.classList.remove(className)
                    } else {
                        console.log("Error: function setClass(): element = ", element);
                    }
                })
            }
        }

        // Обновить значения слайдера
        function updateItemsInfo(value) {
            itemsInfo.update(value);
            _slideItem(true);
        }

        // Отобразить элементы
        function _render() {
            const {
                prevButtonDisabled,
                nextButtonDisabled
            } = controlsInfo;
            let controlsArray = [{
                    element: leftArrow,
                    className: "d-none",
                    disabled: prevButtonDisabled
                },
                {
                    element: rightArrow,
                    className: "d-none",
                    disabled: nextButtonDisabled
                }
            ];
            if (controlsInfo.buttonsEnabled) {
                controlsArray = [
                    ...controlsArray,
                    {
                        element: prevButton,
                        className: "disabled",
                        disabled: prevButtonDisabled
                    },
                    {
                        element: nextButton,
                        className: "disabled",
                        disabled: nextButtonDisabled
                    }
                ];
            }

            // Отображаем/скрываем контроллы
            setClass(controlsArray);

            // Передвигаем слайдер
            sliderWrapper.style.transform = `translateX(${itemsInfo.offset*100}%)`;

            // Задаем активный элемент для точек (dot)
            if (controlsInfo.dotsEnabled) {
                if (document.querySelector(".dot--active")) {
                    document.querySelector(".dot--active").classList.remove("dot--active");
                }
                dotsWrapper.children[itemsInfo.position.current].classList.add("dot--active");
            }
        }

        // Переместить слайд
        function _slideItem(autoMode = false) {
            if (autoMode && intervalId) {
                clearInterval(intervalId);
            }
            _updateControlsInfo();
            _render();
        }

        // Создать HTML разметку для элемента
        function createHTMLElement(tagName = "div", className, innerHTML) {
            const element = document.createElement(tagName);
            className ? element.className = className : null;
            innerHTML ? element.innerHTML = innerHTML : null;
            return element;
        }

        // Доступные методы
        return {
            init
        };
    }())

    slider.init({
        // intervalSpeed: 1000,
        currentItem: 0,
        buttons: true,
        dots: true
    });

    function openSubs(){
        document.getElementById('confirmAdd').style.visibility = 'visible'
    }
    function closeSubs(){
        document.getElementById('confirmAdd').style.visibility = 'hidden'
    }

    let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}


</script>