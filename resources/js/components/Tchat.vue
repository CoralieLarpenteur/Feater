<template>
    <div>
        <section class="container" style="margin-top:100px;">
            <section class="forChat">
            <div class="chatContainer">

                <div class="chatBox">
                    <div class="boxLeft">
                        <div class="message">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem debitis, dicta eaque iusto minima odit qui recusandae? Ab ad architecto beatae consequatur dolores ducimus eum explicabo quam reiciendis. Dolores, molestias?
                            <div class="time">10:11</div>
                        </div>
                    </div>

                    <div class="boxRight">
                        <div class="message">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem debitis, dicta eaque iusto minima odit qui recusandae? Ab ad architecto beatae consequatur dolores ducimus eum explicabo quam reiciendis. Dolores, molestias?
                            <div class="time">10:11</div>

                        </div>
                    </div>

                    <div class="boxLeft">
                        <div class="message">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem debitis, dicta eaque iusto minima odit qui recusandae? Ab ad architecto beatae consequatur dolores ducimus eum explicabo quam reiciendis. Dolores, molestias?
                            <div class="time">10:11</div>

                        </div>
                    </div>

                    <div class="boxRight">
                        <div class="message">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem debitis, dicta eaque iusto minima odit qui recusandae? Ab ad architecto beatae consequatur dolores ducimus eum explicabo quam reiciendis. Dolores, molestias?
                            <div class="time">10:11</div>

                        </div>
                    </div>
                </div>
                <div class="navChat">
        <span class="loader">
      <svg xmlns="http://www.w3.org/2000/svg" width="36.061" height="17.716" viewBox="0 0 36.061 17.716">
  <g id="Groupe_51" data-name="Groupe 51" transform="translate(-36 -551.184)">
    <g id="Groupe_49" data-name="Groupe 49" transform="translate(-41 -34.743)">
      <g id="Rectangle_14" data-name="Rectangle 14" transform="translate(77 585.927)" fill="#fff" stroke="#1c1818" stroke-width="1">
        <rect width="36.061" height="17.716" rx="8.858" stroke="none"/>
        <rect x="0.5" y="0.5" width="35.061" height="16.716" rx="8.358" fill="none"/>
      </g>
    </g>
    <g id="Groupe_50" data-name="Groupe 50" transform="translate(3)">
      <circle id="Ellipse_33" data-name="Ellipse 33" cx="2.5" cy="2.5" r="2.5" transform="translate(41 558)" fill="#212121"/>
      <circle id="Ellipse_34" data-name="Ellipse 34" cx="2.5" cy="2.5" r="2.5" transform="translate(49 558)" fill="#212121"/>
      <circle id="Ellipse_35" data-name="Ellipse 35" cx="2.5" cy="2.5" r="2.5" transform="translate(57 558)" fill="#212121"/>
    </g>
  </g>
</svg>
        </span>
                    <hr>
                    <div class="write">
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="20.856" height="22.392" viewBox="0 0 20.856 22.392">
                                <g id="Groupe_48" data-name="Groupe 48" transform="translate(-105.177 -325.519)">
                                    <path id="Tracé_17" data-name="Tracé 17" d="M145.932,331.419l-5.663-2.273a2.736,2.736,0,0,0-1.953-.031,2.75,2.75,0,0,1,1.01,2.126V346a2.76,2.76,0,0,1-2.752,2.752h-1.856l3.665,1.471a2.761,2.761,0,0,0,3.579-1.529l5.5-13.7A2.76,2.76,0,0,0,145.932,331.419Z" transform="translate(-21.625 -2.512)" fill="#1c1818"/>
                                    <rect id="Rectangle_27" data-name="Rectangle 27" width="11.607" height="20.265" rx="5.803" transform="translate(105.177 325.519)" fill="#1c1818"/>
                                </g>
                            </svg>
                        </button>

                        <textarea placeholder="Écrire message"></textarea>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" width="25.486" height="23.184" viewBox="0 0 25.486 23.184">
                                <path id="Tracé_18" data-name="Tracé 18" d="M97.182,217.2l.878,4.2s.5.251,1-1l2.23-4.518,5.275,3.44s.436.4.711-.669l6.032-18.916s-.023-.711-.665-.39L89.162,210.1s-.665.275-.114.642l6.88,2.89a.941.941,0,0,0,.963-.16l5.711-4.22-5.458,4.633a.807.807,0,0,0-.436.917C96.845,215.471,97.182,217.2,97.182,217.2Z" transform="translate(-88.328 -198.748)" fill="#1c1818" stroke="#606060" stroke-width="1"/>
                            </svg>
                        </button>

                    </div>
                </div>
            </div>
        </section>
        </section>
    </div>
</template>
<script>
export default {
    
}
</script>
<style>
body{
        background-color: black;
    }
    .chatBox{
        width: 85vw;
        height: 65vh;
        background-color: white;
        border-radius: 8px 8px 0px 0px;
        margin: auto;
        padding: 10px;
        overflow: scroll;
        font-family: Helvetica Neue;
    }



    .message {
        margin-top: 10px;
        margin-bottom: 10px;
        width: 65%;
        border-radius: 10px;
        padding: 10px 10px 5px 10px;
    }

    .time{
        text-align: right;
        color: white;
        margin-top: 10px;
    }

    .boxRight{
       display: flex;
        justify-content: flex-end;
    }

    .boxLeft .message{
        background-color: #949494;
        color: white;
    }

    .boxRight .message{
        background-color: #45a7ff;
        color: white;
    }

    .navChat{
        width: 85vw;
        margin:-1px auto 0px;
        background-color: white;
        padding: 10px 10px 0px 10px;
        border-radius: 0px 0px 8px 8px;
    }

    .write{
        display: flex;
        justify-content: space-between;
    }

    .write button{
        background-color: transparent;
        outline: none;
        border: none;
    }
    .write textarea{
        width: 80%;
        padding: 5px;
    }

</style>
