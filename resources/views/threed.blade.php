@php
    $banner = App\Models\Banner::where('page_identifier', 'threedmodels')->first();
@endphp

@include('layouts.header', ['slider' => false, 'banner' => $banner ? $banner->banner : null])
<div class="container my-5">
    <div class="row">
        @for ($i = 0; $i < 5; $i++)
            <div class="col-lg-4 thr-model">
                <div class="threed-wrapper">
                    <img src="{{ asset('/images/mock-model.png') }}" alt="">
                    <div class="hover-content">
                        <div class="d-flex justify-content-between">
                            <p class="model-name">Minotti DONOVAN</p>
                            <div class="mt-5 btn-wrapper">
                                @include('components.download', ['id' => $i])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initial configuration
        TweenMax.set("svg", {
            visibility: "visible"
        })
        TweenMax.set("#tick", {
            drawSVG: "0% 0%"
        })
        TweenMax.set("#circleFill path ", {
            drawSVG: "0% 0%"
        })
        TweenMax.set('#speedLines line', {
            drawSVG: "10% 10%",
            y: -10
        })
        TweenMax.set('#speedLinesDown line', {
            y: 12
        })
        TweenMax.set("#dot", {
            opacity: 0
        })
        TweenMax.set('#arrowDot', {
            opacity: 0
        })

        var masterTl = new TimelineMax({
            paused: false,
            onStart: function() {
                // fix tick stroke with round join is visible on repeat/restart
                TweenMax.set("#tick", {
                    opacity: 0
                })
            }
        });

        function arrowOut() {
            var tl = new TimelineMax();
            // arrow to 0
            tl.to('#arrowGroup line', 0.5, {
                drawSVG: "0% 0%",
                ease: Power4.easeIn
            }, 'in')
            // move arrowDot to circle stroke
            //.to('#arrowDot',0.15,{y:47,ease:Power1.easeIn},'in+=0.4')
            //.to('#arrowDot',0,{opacity:0})
            return tl;
        }

        function drawCircle() {
            var tl = new TimelineMax();
            // Animating the circle fill
            tl.fromTo("#circleFill path", 0.8, {
                    drawSVG: "0%",
                    immediateRender: false
                }, {
                    drawSVG: "100%",
                    ease: Sine.easeIn
                }, 'in+=0.25')
                .to("#circleFill", 0.8, {
                    rotation: '-=360',
                    transformOrigin: "center center",
                    ease: Sine.easeIn
                }, 'in+=0.25')
            return tl;
        }

        function throwDot() {
            var tl = new TimelineMax();
            // throw dot
            tl.to('#dot', 0.01, {
                    opacity: 1
                })
                .to('#dot', 0.2, {
                    y: -100,
                    attr: {
                        rx: 2.5
                    },
                    immediateRender: false,
                    ease: Circ.easeOut
                }, "ballUp")
                .to('#dot', 0.2, {
                    attr: {
                        rx: 4
                    },
                    ease: Back.easeOut
                }, 'ballUp+=0.2')
                .to('#dot', 0.25, {
                    attr: {
                        ry: 2.5
                    },
                    y: -49,
                    immediateRender: false,
                    ease: Power4.easeIn
                }, 'ballUp+=0.35')
            return tl;
        }

        function drawLinesUp() {
            var tl = new TimelineMax();
            // draw speed lines 
            tl.fromTo('#speedLines line', 0.10, {
                    drawSVG: "20% 20%"
                }, {
                    drawSVG: "75%"
                })
                .fromTo('#speedLines line', 0.15, {
                    drawSVG: "75%",
                    immediateRender: false
                }, {
                    drawSVG: "0% 0%",
                    y: 0
                })
            return tl;
        }

        function drawLinesDown() {
            var tl = new TimelineMax();
            // lines down
            tl.fromTo('#speedLinesDown line', 0.10, {
                    drawSVG: "30% 30%"
                }, {
                    drawSVG: "75%"
                })
                .fromTo("#speedLinesDown line", 0.15, {
                    drawSVG: "75%",
                    immediateRender: false
                }, {
                    drawSVG: "100% 100%",
                    y: 15
                })
            return tl;
        }

        function drawTick() {
            var tl = new TimelineMax();
            // draw tick
            tl.fromTo('#tick', 0.35, {
                    drawSVG: "61% 61%",
                    opacity: 1,
                    immediateRender: false,
                }, {
                    drawSVG: "100%",
                    opacity: 1,
                    ease: Back.easeOut
                }, 'draw')
                .to('#dot', 0.1, {
                    opacity: 0
                }, 'draw')
            return tl;
        }

        masterTl.add(arrowOut())
            .add(drawCircle(), 0)
            .add(throwDot(), 'throwDot')
            .add(drawLinesUp(), 'throwDot+=0.05')
            .add(drawTick())
            .add(drawLinesDown(), 'throwDot+=0.49')


        // If the timeline has played all the way through restart the timeline on click
        // else play the animation from the beginning
        function PLayTimeline() {
            if (masterTl.progress() == 1) {
                masterTl.restart()
            } else {
                masterTl.play()
            }
        }
        // Play the animation on click
        document.querySelector('button[id^="downloadButton"]').addEventListener("click", function() {
            PLayTimeline()
        });
    });
</script>
@include('layouts.footer')
