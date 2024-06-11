@include('layouts.header', ['slider' => true])
<div class="container py-5">
    <div class="w-100">
        <div class="left-div">
            <h2>О нас</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, itaque doloremque animi pariatur
                mollitia
                quas id quasi, qui, veniam rem accusantium possimus dolorum harum minima eveniet facilis cumque
                similique
                maxime.
            <p>
        </div>
        <div class="right-div">
            <h2>О нас</h2>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, itaque doloremque animi pariatur
                mollitia
                quas id quasi, qui, veniam rem accusantium possimus dolorum harum minima eveniet facilis cumque
                similique
                maxime.
            <p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, itaque doloremque animi pariatur
                mollitia
                quas id quasi, qui, veniam rem accusantium possimus dolorum harum minima eveniet facilis cumque
                similique
                maxime.
            <p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, itaque doloremque animi pariatur
                mollitia
                quas id quasi, qui, veniam rem accusantium possimus dolorum harum minima eveniet facilis cumque
                similique
                maxime.
            <p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cupiditate, itaque doloremque animi pariatur
                mollitia
                quas id quasi, qui, veniam rem accusantium possimus dolorum harum minima eveniet facilis cumque
                similique
                maxime.
            <p>
        </div>
    </div>
    <div class="text-center">
        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eveniet nulla saepe magni similique harum tempore
        doloribus ex! Illum veritatis animi laboriosam, repellat harum voluptatum facere voluptatibus vel accusamus,
        aspernatur quas.
    </div>
    <div class="row">
        <div class="col-lg-6">
            <img src="{{ asset('/images/2.png') }}">
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti exercitationem unde distinctio veniam
                quam, in eveniet. Officia laudantium explicabo repudiandae. Iusto tenetur voluptates labore
                necessitatibus
                laudantium rem dolor ratione illo.
            </div>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('/images/2.png') }}">
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti exercitationem unde distinctio veniam
                quam, in eveniet. Officia laudantium explicabo repudiandae. Iusto tenetur voluptates labore
                necessitatibus
                laudantium rem dolor ratione illo.
            </div>
        </div>
        <div class="col-lg-6">
            <img src="{{ asset('/images/2.png') }}">
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti exercitationem unde distinctio veniam
                quam, in eveniet. Officia laudantium explicabo repudiandae. Iusto tenetur voluptates labore
                necessitatibus
                laudantium rem dolor ratione illo.
            </div>
        </div>
        <div class="col-lg-6 align-self-center d-flex flex-column text-center">
            <div>
                <div class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium vitae sapiente
                    veniam eos qui, hic non quia dolor inventore voluptate rerum corrupti quisquam facere dolore
                    cupiditate
                    ipsam officia nobis error!</div>
            </div>
        </div>
        <div class="col-lg-12 text-center">
            <button>123123<i class="fa fa-download" aria-hidden="true"></i></button>
        </div>
    </div>
</div>

@include('layouts.footer')
<style>
    .right-div,
    .left-div {
        max-width: 50%;

    }

    .right-div {
        text-align: right;

        margin-left: auto;
    }

    .left-div {
        text-align: left;

        margin-right: auto;
    }
</style>
