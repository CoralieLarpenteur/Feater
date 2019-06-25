<template>
    <main>
        <section class="container text-white">
            <div class="d-flex justify-content-center">
                <span class="titleBtwCloseBlo text-center">Mes likes : </span>
            </div>
            
            <section  class="allRoundPictText ">
                <div class="roundPictText">
                    <img class="roundPict" data-connect="1" src="https://picsum.photos/200/300" alt="">
                    <span>Jaimi Reyes</span>
                </div>
                <div class="roundPictText">
                    <img class="roundPict" data-connect="1"  src="https://picsum.photos/200/100" alt="">
                    <span>Sean Collins</span>
                </div>
                <div class="roundPictText">
                    <img class="roundPict" data-connect="0"src="https://picsum.photos/300/300" alt="">
                    <span>Guilia Wilis</span>
                </div>
                <div class="roundPictText">
                    <img class="roundPict" data-connect="1"src="https://picsum.photos/200/100" alt="">
                    <span>Edward Hughes</span>
                </div>
                <div class="roundPictText">
                    <img class="roundPict" data-connect="0"src="https://picsum.photos/400/300" alt="">
                    <span>Angelina Lews</span>
                </div>
                <div class="roundPictText">
                    <img class="roundPict" data-connect="1"src="https://picsum.photos/400/300" alt="">
                    <span>Angelina Lews</span>
                </div>
            </section>
            <div class="d-flex justify-content-center">
                <span class="titleBtwCloseBlo text-center">Mes activités : </span>
            </div>
            <div class="allRoundPictText">
                <div class="roundPictText">
                    <img class="roundPict" src="https://picsum.photos/200/300" alt="">
                    <span>Running</span>
                </div>
                <div class="roundPictText ">
                    <img class="roundPict" src="https://picsum.photos/200/100" alt="">
                    <span>Rameurs</span>
                </div>
                <div class="roundPictText ">
                    <img class="roundPict" src="https://picsum.photos/200/100" alt="">
                    <span>Squat</span>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <span class="titleBtwCloseBlo text-center">Mes Lieux : </span>
            </div>
            <div class="allRoundPictText">
                <div class="roundPictText">
                    <img class="roundPict" src="https://picsum.photos/200/300" alt="">
                    <span>Le comptoir</span>
                </div>
                <div class="roundPictText ">
                    <img class="roundPict" src="https://picsum.photos/200/100" alt="">
                    <span>Nanashi</span>
                </div>
                <div class="roundPictText ">
                    <img class="roundPict" src="https://picsum.photos/200/100" alt="">
                    <span>Marcelle</span>
                </div>
            </div>
            <ul class="marginBottom">
                <li>Historique</li>
                <li>Modifier mot de passe</li>
                <li>Besoin d'aide ?</li>
                <li>Supprimer mon compte</li>
            </ul>
        </section>
    </main>
</template>
<script>
export default {
    data() {
        return {
            name:null,
            isLoggedIn: localStorage.getItem('feater.jwt') != null,
        }
    },
    beforeMount() {
        if (this.isLoggedIn) {
            let user = JSON.parse(localStorage.getItem('feater.user'))
            this.name = user.name
            
        }
    },
}
</script>
<style scoped>
.marginBottom {
  margin-bottom: 10vh; }

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box; }

ul {
  list-style: none;
  font-size: 16px;
  font-family: "helvetica", Arial, sans-serif;
  text-align: center; }
  ul li {
    margin-bottom: 3vh; }

input, button {
  outline: unset; }

button {
  background-color: inherit;
  font-size: 15px;
  color: inherit; }

body {
  background-color: #1C1818;
  font-size: 18px;
  /* //color: #FFFFFF; */
  padding: 5vw;
  font-family: "Montserrat", Arial, sans-serif; }

h1 {
  font-size: 18px;
  font-family: "helvetica", Arial, sans-serif; }

input {
  outline: unset;
  padding: 1vh 5vw;
  border: solid 1px #707070;
  border-radius: 50px; }

img[data-connect="1"] {
  border: #24EEFF solid 2px; }

img[data-connect="0"] {
  border: #606060 solid 2px; }

main {
  display: flex;
  flex-direction: column;
  align-items: center; }
  main .roundPict {
    height: 15vw;
    width: 15vw;
    border-radius: 50%;
    object-fit: cover; }
  main nav {
    display: flex;
    position: relative;
    align-items: center;
    width: 100%;
    flex-direction: column; }
    main nav #arrow-left {
      left: 0;
      top: 50%;
      position: absolute; }
    main nav #profilPicture {
      height: 10vh;
      width: 10vh; }
    main nav hr {
      background-color: #fff;
      height: 3px;
      width: 20vw;
      margin: 3vh 0 10vh 0; }
  main #deconnexion, main #validateModifyPsw, main #ereaseProfilButton {
    padding: 1vh 10vw;
    border: solid 1px #707070;
    border-radius: 50px; }
  main #profilPicture {
    height: 20vh;
    width: 20vh;
    border-radius: 50%;
    margin-bottom: 3vh;
    border: solid 1px #707070; }
  main .titleBtwCloseBlo {
    margin-bottom: 3vh; }
  main .allRoundPictText {
    display: flex;
    overflow-x: scroll;
    max-width: 90vw;
    scroll-snap-type: x proximity;
    margin-bottom: 5vh; }
    main .allRoundPictText .roundPictText {
      scroll-snap-align: start;
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-right: 10vw; }
      main .allRoundPictText .roundPictText:last-child {
        margin-right: unset; }
      main .allRoundPictText .roundPictText span {
        margin-top: 2vh;
        text-align: center;
        font-size: 10px; }
  main .session {
    width: 100%;
    display: flex;
    margin-bottom: 3vh;
    position: relative; }
    main .session .description {
      font-size: 13px;
      font-family: "helvetica", Arial, sans-serif; }
    main .session .roundPict {
      margin-right: 3vh; }
    main .session .infoMessage {
      display: flex; }
  main #modifyPsw {
    width: 100%; }
    main #modifyPsw form {
      display: flex;
      flex-direction: column; }
      main #modifyPsw form input {
        margin-bottom: 3vh; }
        main #modifyPsw form input:last-child {
          margin-bottom: unset; }
      main #modifyPsw form button {
        width: 60%;
        align-self: center;
        margin-top: 10vh; }
  main #settingsContent {
    width: 80%; }
    main #settingsContent .settingLink {
      background-color: #fff;
      color: initial;
      border-radius: 50px;
      display: flex;
      justify-content: space-between;
      padding: 10px 20px;
      font-size: 15px;
      font-family: "helvetica", Arial, sans-serif;
      margin-bottom: 3vh; }
      main #settingsContent .settingLink::after {
        content: url("https://picsum.photos/400/300");
        height: 10px;
        width: 10px; }
  main .help h1 {
    margin-bottom: 2vh; }
  main .help p {
    margin-bottom: 3vh; }
  main #ereaseProfil {
    display: flex;
    flex-direction: column;
    align-items: center; }
    main #ereaseProfil h1 {
      text-align: center; }
  main .messageDate {
    position: absolute;
    top: 0;
    right: 0;
    font-size: 10px;
    font-family: "helvetica", Arial, sans-serif; }



/*# sourceMappingURL=style.css.map */

</style>