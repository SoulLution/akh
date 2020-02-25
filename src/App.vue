<template>
  <div class="main">
    <div class="popup" v-if="popup">
      <div class="popup-bg" @click="type !== undefined ? popup = false : ''"></div>
      <div class="popup-content">
        <div class="popup-content-message" :class="{'success': type === true,'error': type === false,'await': type === undefined}">{{message}}</div>
        <div class="popup-content-button" @click="type !== undefined ? popup = false : ''">Закрыть</div>
      </div>
    </div>
    <div class="header">

      <div class="header-main">
        <img class="header-main-bg" src="static/header_bg.svg">
        <img class="header-main-logo" src="static/logo.png">
        <img class="header-main-logo mob" src="static/logo.png">
        <div class="header-main-title">Продвижение и автоматизация </div>
        <div class="header-main-about">для застройщиков, девелоперов и агентств недвижимости</div>
        <div class="button header-main-button" @click="comeToElem('form')">
          <img class="button-bg" src="static/0_button.svg">
          <img class="button-shadow" style="height: 105%;right: -55px;top: 1px;" src="static/0_shadow.svg">
          <div class="button-title">Получить консультацию</div>
        </div>
        <div class="header-main-down" @click="comeToElem('section', 0)">
          <div class="header-main-down-side"></div>
        </div>
      </div>


    </div>


    <div class="body">

      <img class="body-side" src="static/side.svg">


      <div class="body-section" ref="section" :class="{ 'reverse': i % 2 !== 0, 'invisible': scrolling < i }" v-for="(sector, i) in data">
        <img class="body-section-img" :style="{marginLeft: i === 4 ? '10%' : 0, maxWidth: i === 4 ? '391px' : '50%'}" :src="'static/' + i + '.jpg'">
        <div class="body-section-content">
        <img class="body-section-content-figure" :style="{animation:('sprinkle-wiggle-' + i + ' 5s ease-in-out infinite')}" :src="'static/' + i + '.svg'" @mouseover="e=>{ setAnim(e, i) }">
          <div class="body-section-content-title">{{sector.title}}</div>
          <div class="body-section-content-about">{{sector.about}}</div>
        </div>
      </div>

      <form class="body-form" ref="form" @submint.prevent="sendEmail">
        <div class="body-form-header">
          <div class="body-form-header-title">А еще мы можем просто проконсультировать вас по любому вопросу</div>
          <img class="body-form-header-figure" src="static/form_bg.svg">
        </div>
        <div class="body-form-body">
          <label for="i0" class="body-form-body-input" :class="{ 'active': form0 || modal0 }"><div>Имя</div> <input autocomplete="off" required v-model="modal0" id="i0" @focus="changeForm(0)" @blur="changeForm(0)" name="name" type="text"></label>
          <label for="i1" class="body-form-body-input" :class="{ 'active': form1 || modal1}"><div>Телефон</div> <input autocomplete="off" required v-model="modal1" id="i1" @focus="changeForm(1)" @blur="changeForm(1)" name="phone" type="text"></label>
          <label for="i2" class="body-form-body-input __full" :class="{ 'active': form2 || modal2}"><div>Напишите свой вопрос</div> <textarea required v-model="modal2" id="i2" @focus="changeForm(2)" name="question" @blur="changeForm(2)"></textarea></label>
        </div>
        <label for="submit1" class="body-form-footer" ref="section" v-for="i in 1">
          <div class="button body-form-footer-button">
            <img class="button-bg reverse" src="static/1_button.svg">
            <img class="button-shadow reverse" style="right: -7px;top: -2px;" src="static/1_shadow.svg">
            <input id="submit1" type="submit" class="button-title" value="Отправить" @click="sendEmail">
          </div>
        </label>
      </form>

      <div class="body-cases">
        <div class="body-cases-title">
          <div class="body-cases-title-font">Наши кейсы: </div>
          <div class="body-cases-title-hr"></div>
        </div>
        <div class="body-cases-case" :class="{'invisible': scrolling < i + 7}" ref="section" v-for="(cell, i) in cases">
          <div class="body-cases-case-body" :class="'case-body-'+i">
            <div class="body-cases-case-body-bg"></div>
            <img class="body-cases-case-body-figure" :src="'static/' + i + '_case.svg'">
            <div class="body-cases-case-body-title">{{cell.title}}</div>
            <div class="body-cases-case-body-about">{{cell.about}}</div>
          </div>
        </div>
      </div>
      

    </div>


    <div class="footer">
      <img class="footer-bg" src="static/footer_bg.svg">
      <div class="footer-title">Отправить запрос на сотрудничество </div>
      <form class="body-form" @submint.prevent="sendEmail">
        <div class="body-form-body">
          <label for="i3" class="body-form-body-input" :class="{ 'active': form0 || modal0 }"><div>Имя</div> <input autocomplete="off" required v-model="modal0" id="i3" @focus="changeForm(0)" @blur="changeForm(0)" type="text"></label>
          <label for="i4" class="body-form-body-input" :class="{ 'active': form1 || modal1}"><div>Телефон</div> <input autocomplete="off" required v-model="modal1" id="i4" @focus="changeForm(1)" @blur="changeForm(1)" type="text"></label>
          <label for="i5" class="body-form-body-input __full" :class="{ 'active': form2 || modal2}"><div>Напишите свой вопрос</div> <textarea required v-model="modal2" id="i5" @focus="changeForm(2)" @blur="changeForm(2)"></textarea></label>
        </div>
        <label for="submit2" class="body-form-footer">
          <div class="button body-form-footer-button">
            <img class="button-bg" src="static/2_button.svg">
            <img class="button-shadow" style="right: -8px;top: -1px;" src="static/2_shadow.svg">
            <input id="submit2" type="submit" class="button-title" value="Отправить" @click="sendEmail">
          </div>
        </label>
      </form>
      <div class="footer-ready">Готовы к работе с вами:</div>
      <div class="footer-number">
        <a href="tel:87070000092" class="button footer-number-button">
            <img class="button-bg reverse" src="static/phone_bg.svg">
            <img class="button-shadow reverse" style="right: -7px;top: -1px;" src="static/phone_shadow.svg">
            <div class="button-title footer-number-title">8 707 000 00 92</div>
          </a>
      </div>
      <div class="footer-contacts">
        <div class="footer-contacts-title">help@akh.kz</div>
        <div class="footer-contacts-body">
          <a href="geo:43.2593064,76.9297241,15" class="button footer-contacts-body-button">
            <img class="button-bg button-address" src="static/address_bg.svg">
            <img class="button-shadow button-address" style="bottom: -3px;" src="static/address_shadow.svg">
            <div class="button-title">г. Алматы, Достык 97 Б, 278 офис</div>
          </a>
        </div>
      </div>
    </div>

  </div>
</template>

<script>
  import Vue from "vue";
  export default Vue.extend({
    data: () => {
      return {
        anim: [0,0,0,0,0,0,0],
        form0: false,
        form1: false,
        form2: false,
        modal0: '',
        modal1: '',
        modal2: '',
        scrolling: -1,
        popup: false,
        type: undefined,
        message: '',

        data: [
          {
            title: 'Готовим ЖК для выхода на продажу ',
            about: 'Нейминг, концепция, позиционирование, первичные презентационные материалы, печатная продукция, стратегия продвижения, внедряем динамическое ценообразование. '
          },
          {
            title: 'Оформляем строительную площадку ',
            about: 'Начиная со строительного забора и мобильного офиса продаж, заканчивая демо путем клиента и шоу рум квартиры. '
          },
          {
            title: 'Серьезно работаем с контентом ',
            about: 'Ведем страницы в социальных сетях для того, чтобы отражать идеи, продавать и повышать доверие к компании. '
          },
          {
            title: 'Создаем и ведем рекламные кампании',
            about: 'Оригинальные методы таргетинга в сочетании с безошибочной настройкой поисковой  и КМС рекламы.'
          },
          {
            title: 'Разрабатываем и ведем стратегии офлайн рекламы ',
            about: 'Специализированные ивенты, ярмарки продаж, кросс промоушен, BTL акции. '
          },
          {
            title: 'Внедряем/дорабатываем CRM',
            about: 'Правильные воронки продаж, эффективные интеграции и умная телефония. '
          },
          {
            title: 'Внедряем отчётность по метрикам ',
            about: 'Стоимость лида, стоимость брони, стоимость продажи. Процент некачественных лидов, процент зависших сделок и еще 67 метрик для отдела продаж и маркетинга.  Рост прибыли в итоге достигается тем, что поддержка продаж ориентируется на данные (Data-driven), а не на теории или голые идеи.'
          },
        ],
        cases: [
          {
            title: 'Строительная компания ISG ',
            about: `Полный аутсорсинг департамента маркетинга с мая 2018 года.
              Формируем маркетинговые стратегии, выводим объекты жилой недвижимости в продажу, ведем профили в социальных сетях, создаем диджитал и офлайн рекламные кампании для всех ЖК застройщика, разрабатываем печатные материалы.  `
          },
          {
            title: 'Cтроительная компания Arkantor',
            about: `Полный аутсорсинг департамента маркетинга с мая 2019 года.
              Формируем маркетинговые стратегии, ведем профили в социальных сетях, создаем диджитал и офлайн рекламные кампании, разрабатываем печатные материалы.  `
          },
          {
            title: 'Строительная компания NB Construction ',
            about: `Полный аутсорсинг департамента маркетинга с января  2020 года.  
              Формируем маркетинговые стратегии, выводим объекты жилой недвижимости в продажу, ведем профили в социальных сетях, создаем диджитал и офлайн рекламные кампании для всех ЖК застройщика, разрабатываем печатные материалы.  `
          },
        ]
      }
    },
    created(){
      window.onscroll = () => {
        let height = document.scrollingElement.clientHeight
        for(let i = this.$refs['section'].length - 1; i >= 0 ; i--){
          let top = this.$refs['section'][i].getBoundingClientRect().top
          let elem = top - height + ( i > 6 ? (height - 50) : (height / 3))
          if(elem <= 0){
            this.scrolling = i;
            break;
          }
          if(i === 0) this.scrolling = -1;
        }
      }
    },
    methods: {
      popupMessage(e){
        this.type = e
        if(e === false)
          this.message = 'Ой! Что-то пошло не так, попробуйте повторить запрос позже.'
        else if(e === true)
          this.message = 'Ваш запрос обрабатывается, в ближайшее время с вами свяжется консультант.'
        else
          this.message = 'Пожалуйста, подождите, пока ваш запрос отправится.'
        this.popup = true
      },
      sendEmail(e){
        e.preventDefault();
        this.popupMessage(undefined)
        let data = JSON.parse({
          fio: this.modal0,
          phone: this.modal1,
          question: this.modal2,
          _replyto: 'help@akh.kz'
        })
        this.$axios
         .post(
              "mail.php",
              data
         )
         .then(res => {
            this.modal0 = ''
            this.modal1 = ''
            this.modal2 = ''
            this.popupMessage(true)
         })
         .catch(err => {
            this.popupMessage(false)
         })
       return false
      },
      comeToElem(ref, index){
        let top
        if(index || index === 0)
          top = this.$refs[ref][index].offsetTop
        else
          top = this.$refs[ref].offsetTop
        window.scrollTo({
          top: top + document.scrollingElement.clientHeight + (document.scrollingElement.clientHeight / 10),
          behavior: 'smooth'
        });
      },
      changeForm(index){
        if(this['form'+index]) 
          this['form'+index] = false
        else
          this['form'+index] = true
      },
      setAnim(e, i){
        e.target.style.animation = 'cta-hover 0.4s ease-in-out 1'
        e.target.style.animationDelay =  '0s'
        e.target.style.animationDirection = 'normal'
        if(this.anim[i]) clearTimeout(this.anim[i])
        this.anim[i] = setTimeout(()=>{
          e.target.style.animation = ('sprinkle-wiggle-' + i + ' 5s ease-in-out infinite')
          e.target.style.animationDelay =  '.3s'
          e.target.style.animationDirection = 'reverse'
          this.anim[i] = false
        },250)
      }
    }
  });
</script>

<style lang="scss" >

  $main_font: #333333;
  $white: #ffffff;
  $grey: #F2F2F2;
  $grey_border: #E0E0E0;
  $black: #1F1F1F;
  $black_08: rgba(0,0,0,0.08);
  
  $green: #219653;
  $green_l: #85F5A4;

  $blue: #2F80ED;
  $blue_l: #58BAF1;
  $blue_l_2: #85DAF5;
  $cian: #43F0C7;
  $cian_l: #7BFBE4;

  $red: #E57979;
  $purple: #FF93E1;
  $purple_l: #CC95FF;
  
  $orange: #FFBC7B;
  $yellow: #E9E237;
  $yellow_l: #F3F585;

  @font-face {
    font-family: "Gotham";
    src: url('/static/fonts/GothamPro-Medium.ttf') format("truetype");
  }
  @mixin gotham {
    font-family: "Gotham" ;
  }
  @font-face {
    font-family: "Gibson";
    src: url('/static/fonts/GothaProLig.otf') format("truetype");
  }
  @mixin gibson {
    font-family: "Gibson" ;
  }

  @font-face {
    font-family: "Yeseva_One";
    src: url('/static/fonts/Yeseva_One.ttf') format("truetype");
  }
  @mixin yeseva {
    font-family: "Yeseva_One" ;
  }

  @font-face {
    font-family: "SFProText";
    src: url('/static/fonts/FontsFree-Net-SFProText-Regular.ttf') format("truetype");
  }
  @mixin sfpro {
    font-family: "SFProText" ;
  }


  body{
    margin: 0 auto;
    max-width: 1440px;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
  }
  div, label, a, form{
    display: flex;
    width: 100%;
    max-width: 100vw;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    box-sizing: border-box;
    position: relative;
    text-align: center; 
    text-decoration: none;
    color: $main_font;
    @include gibson();
  }
  img{
    user-select: none;
  }
  *::-webkit-scrollbar-thumb{
    background-color: $blue;
    cursor: pointer;
  }
  *::-webkit-scrollbar {
    background-color: $black_08;
    width: 5px;
  }
  input:-internal-autofill-selected{
    background-color: transparent !important;
  }
  input[type="submit" i]{
    background-color: transparent;
    border: unset;
    outline: none;
  }

  .popup{
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    width: 100vw;
    justify-content: center;
    align-items: center;
    z-index: 20;
    &-bg{
      position: absolute;
      height: 100%;
      width: 100%;
      background-color: #00000080;
    }
    &-content{
      border-radius: 10px;
      background-color: $white;
      width: 80%;
      padding: 2.5%;
      max-width: 400px;
      &-message{
        color: $black;
        font-weight: bold;
        font-size: 16px;
        line-height: 20px;
        margin-bottom: 5%;
        &.success{
          color: #00ca1c;
        }
        &.error{
          color: #ff2b2b;
        }
        &.await{
          color: #888888;
        }
      }
      &-button{
        color: $black;
        border: 1px solid $black;
        border-radius: 50px;
        cursor: pointer;
        width: auto;
        padding: 12px 32px;
      }
    }
  }

  .main{
    background-color: $white;
    overflow: hidden;
  }
  .button{
    cursor: pointer;
    width: auto;
    &-bg{
      z-index: 1;
      animation:button-wiggle 5s ease-in-out infinite;
      &.reverse{
        animation-direction: reverse;
      }
    }
    &-shadow{
      animation:button-wiggle 5s ease-in-out infinite;
      position: absolute;
      right: 0;
      width: 100%;
      z-index: 0;
      &.reverse{
        animation-direction: reverse;
      }
    }
    &-title{
      z-index: 2;
      position: absolute;
      color: $white;
      font-size: 18px;
      line-height: 21px;
    }
    &-address{
      transition: 0.3s;
      animation: unset !important;
    }
    &:hover{
      .button-bg, .button-shadow{
        animation: cta-hover 0.4s ease-in-out 1;
      }
      .button-address{
        transform: scale(1.1);
        animation: unset !important;
      }

    }
  }
  
    .header{

      &-main{
        overflow: hidden;
        margin: 10px 72px 188px;
        width: calc(100% - 144px);
        min-height: 695px;
        min-width: 1296px;
        // max-height: 80vh;
        &-bg{
          position: absolute;
          z-index: -1;
          width: 100%;
          min-width: 1296px;
        }
        &-logo{
          color: $main_font;
          font-size: 40px;
          font-weight: bold;
          width: 27.5%;
          &.mob{
            display: none !important;
          }
        }
        &-title{
          color: $green;
          text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
          font-size: 55px;
          font-weight: bold;
          margin-bottom: 28px;
          @include gotham();
        }
        &-about{
          margin-bottom: 72px;
          font-size: 24px;
          line-height: 29px;

        }
         &-button{ 
          margin-bottom: 58px;
         }
        &-down{
          cursor: pointer;
          height: 80px;
          width: 80px;
          border-radius: 50%;
          border: 1px solid transparent;
          &-side{
            height: 40px;
            width: 40px;
            margin-top: -20px;
            border-color: $grey_border;
            border-style: solid;
            border-bottom: 5px;
            border-left: 5px;
            transform: rotate(135deg);
          }
          &:hover{
            border-color: $blue_l;
          }
          &:active{
            background-color: $blue;
          }
        }
      }
    }

    .body{
      margin-bottom: 100px;
      &-side{
        position: absolute;
        z-index: 0;
        top: 218px;
        animation:background-wiggle 7s ease-in-out infinite;
        user-select: none;
        pointer-events: none;
      }
      &-section{
        flex-direction: row;
        justify-content: flex-end;
        margin: 100px 0;
        transition: 0.3s;
        padding: 125px 0;
        &-img{
          max-width: 50%;
          width: 100%;
          transition: 0.3s;
          position: absolute;
          left: 0;
        }
        &-content{
          max-width: 490px;
          margin: 0 0 0 80px;
          width: 75vw;
          &-figure{
            transition: 0.5s;
            position: absolute;
            top: -20%;
            left: 0;
            // animation:sprinkle-wiggle 5s ease-in-out infinite;
            animation-delay: .3s;
            animation-direction: reverse;
            transform: scale(1) rotate(0);
          }
          &-title{
            transition: 0.3s;
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 18px;
            text-align: left;
            line-height: 150%;
            white-space: normal;
          }
          &-about{
            transition: 0.3s;
            font-size: 18px;
            text-align: left;
            line-height: 150%;
          }
        }
        &.reverse{
          justify-content: flex-start;
          .body-section-img{
            right: 0;
            left: unset;
          }
          &.invisible{
            .body-section-img{
              right: -10% !important;
              left: unset !important;
            }
          }
        }
        &.invisible{
          .body-section-img{
            margin-left: 0 !important;
            left: -10% !important;
            opacity: 0.2;
          }
          .body-section-content{
            // margin-left: 100% !important;
            // opacity: 0;
          }
          .body-section-content-figure{
            transition: 0.5s;
            transform: scale(0) rotate(160deg);
            animation: unset !important;
          }
          .body-section-content-title{
            transform: scale(0);
          }
          .body-section-content-about{
            transform: scale(0);
          }

        }
      }
      &-form{
        width: 636px;
        &-header{
          padding: 0 73px;
          &-title{
            font-size: 18px;
            line-height: 150%;
            font-weight: bold;
            z-index: 1;
          }
          &-figure{
            position: absolute;
            top: -40%;
            animation:sprinkle-wiggle 5s ease-in-out infinite;
            animation-delay: .3s;
            animation-direction: reverse;
            z-index: 0;
          }
        }
        &-body{
          margin: 38px 0 56px;
          flex-wrap: wrap;
          flex-direction: row;
          padding: 5px 0;
          justify-content: space-between;
          &-input{
            padding: 20px 18px;
            width: calc(50% - 18px);
            margin-bottom: 20px; 
            border: 1px solid #CED4E1;
            border-radius: 4px;
            background-color: $white;

            &>div{
              left: 18px;
              top: 20px;
              font-size: 18px;
              width: auto;
              position: absolute;
              color: #828282;
              transition: 0.3s;
              @include sfpro();
            }
            &>input, &>textarea{
              @include sfpro();
              width: 100%;
              height: 100%;
              font-size: 14px;
              line-height: 14px;
              outline: none;
              border: none;
              color: $main_font;
              background-color: transparent;
              resize: none;
            }
            &.__full{
              width: 100%;
              height: 148px;
            }
            &.active{
              border-color: $blue;
                &>div{
                  font-size: 12px;
                  top: 7px;
                }
                &>input{

                }
              }
          }
        }
        &-footer{
          margin-bottom: 160px;
          &-button{

          }
        }
      }

      &-cases{
        &-title{
          margin-bottom: 262px;
          &-font{
            width: auto;
            @include yeseva();
            text-transform: uppercase;
            text-align: center;
            font-size: 40px;
            line-height: 46px;
            padding-bottom: 26px;
            border-bottom: 3px solid $main_font;
          }
          &-hr{
            width: 100%;
            height: 3px;
            // background-color: $main_font;
          }
        }
        &-case{
          flex-direction: column;
          align-items: flex-start;
          margin-bottom: 150px;
          &:nth-child(3){
            align-items: flex-end;
          }
          &-body{
            max-width: 565.685424949px;
            width: calc(35vw * 1.5);
            &.case-body-0{
              margin-left: 5vw;
            }
            &.case-body-1{
              margin-right: 5vw;
            }
            &.case-body-2{
              margin-left: 10vw;
            }
            &-bg{
              max-width: 400px;
              width: 35vw;
              max-height: 400px;
              height: 35vw;
              position: absolute;
              background-color: $grey;
              transform: rotate(45deg);
              z-index: 0;
              left: 80px;
              transition: 0.7s;
            }
            &-figure{
              position: absolute;
              top: -20%;
              right: 120px;
              animation:sprinkle-wiggle 5s ease-in-out infinite;
              animation-delay: .3s;
              animation-direction: reverse;
              transition: 0.5s;
            }
            &-title{
              text-align: left;
              color: $black;
              font-weight: bold;
              font-size: 24px;
              line-height: 28px;
              transition: 0.3s;
            }
            &-about{
              text-align: left;
              color: $black;
              font-size: 18px;
              line-height: 150%;
              transition: 0.3s;
            }
          }
          &.invisible{
            .body-cases-case-body-bg{
              transform: scale(0.5) rotate(-360deg);
            }
            .body-cases-case-body-figure{
              top: 20%;
              right: 120px;
              animation: unset;
              transform: scale(0.5);
            }
            .body-cases-case-body-title{
              transform: scale(0);
            }
            .body-cases-case-body-about{
              transform: scale(0);
            }

          }
        }
      }
    }

    .footer{
      background-color: $main_font;
      &-bg{
        position: absolute;
        right: 0;
        max-width: 80vw;
      }
      &-title{
        color: $white;
        margin: 71px 0 55px;
        font-weight: bold;
        font-size: 18px;
        line-height: 150%;
      }
      &-ready{
        @include yeseva();
        font-size: 3.5rem;
        line-height: 150%;
        color: $yellow;
        text-align: left;
        text-transform: uppercase;
        align-items: flex-start;
        margin-left: 118px;
      }
      &-number{
        margin-left: 103px;
        align-items: flex-start;
        &-title{
            font-weight: bold;
            font-size: 50px;
            line-height: 150%;
          }
        &:hover{
          .footer-number-figure{
            animation: cta-hover 0.4s ease-in-out 1;
          }
        }
        &-figure{

        }
        &-phone{
          position: absolute;
          left: 25px;
          width: auto;
          color: $white;
          font-weight: bold;
          font-size: 50px;
          line-height: 150%;

        }
        &-hr{
          max-width: 725px;
          position: absolute;
          left: -103px;
          height: 2px;
          background-color: $white;
          bottom: -22px;
        }
      }
      &-contacts{
        margin-top: 85px;
        &-title{
          color: $white;
          margin-bottom: 12px;
        }
        &-body{
          margin-bottom: 10px;

          
        }
      }
    }


@media all and (max-width: 768px){
  .header-main{
    margin: 10px 0 50px;
    width: 100%;
    padding: 0 15px;
    min-width: 100%;
    &-button{
      &>img{
        width: 80%;
        &.button-shadow{
          right: 0 !important;
        }
      }
    }
    &-logo{
      width: 80%;
      display: none;
      &.mob{
        display: flex !important;
      }
    }
    &-title{
      font-size: 32px;
    }
    &-about{
      font-size: 18px;
    }
  }
  .body{
    &-section-content{
      &-figure{
        max-width: 66vw;
        top: -5%;
      }
      &-about{
      }
    }
    &-cases-title-font{
      font-size: 24px;
    }
    &-cases-case-body{
      &-title{
        font-size: 18px;
      }
      &-about{
        font-size: 14px;
      }
    }
    &-form{
      padding: 0 10px;
      &-header-figure{
        top: -20%;
      }
      &-body-input{
        width: 100%;
      }
    }
  }
  .body-section{
    flex-direction: column;
    padding: 0;
    &-img{
      position: relative;
      max-width: 66vw !important;
      margin-left: -66% !important;
    }
    &-content{
      margin-top: -15%;
      margin-left: 35%;
      max-width: 50vw;
    }
    &.reverse{
      justify-content: flex-start;
      .body-section-img{
        margin-right: -66% !important;
        margin-left: unset !important;
      }
      .body-section-content{
        margin-right: 35% !important;
        margin-left: unset !important;
      }
    }
  }
  .body-cases-case{
    align-items: center !important;

    &-body{
      width: 100vw;
      max-width: 100vw;
      height: calc(65vw * 1.1);
      margin: 0 !important;
      &-bg{
        width: 65%;
        height: 65vw;
        max-width: 65%;
        max-height: 65vw;
        left: unset;
        right: unset;
      }
      &-figure{
        top: unset;
        margin-top: -80px;
      }
      &-title{
        width: 80vw;
      }
      &-about{
        width: 80vw;
      }
      &.case-body-2{
        .body-cases-case-body-figure{
          left: 10%;
        }
      }
    }
  }

  .footer{
    &-title{
      margin: 50px 0 0;
    }
    &-ready{
      font-size: 30px;
      margin-left: 5px;
    }
    &-number{
      margin-left: 8px;
      &-button{
      align-items: flex-start;
        &>img{
          width: 50%;
        }
        .button-shadow{
          left: 0;
        }
      }
      &-title{
        left: 0;
        width: auto;
        font-size: 24px;
      }
    }
    &-contacts-body{
      width: 95%;
      &-button{
        width: 100%;
        &>.button-title{
          font-size: 16pxl
        }
        .button-address{
          width: 100%;
        }
      }
    }
  }
}
@media screen and (max-width: 601px){
   .body{
    &-section{
      &-content{
        &-figure{

        }
        &-about{
          width: 94vw;
          margin-left: -32vw;
        }
      }
      &.reverse{
        .body-section-content-about{
          margin-right: -40vw;
          margin-left: unset;
        }
      }
    }
    &-cases-title{
      margin-bottom: 5rem;
    }
    &-form-footer{
      margin-bottom: 5rem;
    }
  }
}








@keyframes background-wiggle{
  0%, 25%, 50%, 75%, 100%{transform:none}
  12.5%{transform: rotate(3deg) translate3d(2px, -2px, 0)}
  37.5%{transform: rotate(-1deg) translate3d(-1px, 2px, 0)}
  62.5%{transform: rotate(4deg) translate3d(1px, 1px, 0)}
  87.5%{transform: rotate(5deg) translate3d(-2px, -1px, 0)}
}


@keyframes sprinkle-wiggle-0{
  0%, 25%, 50%, 75%, 100%{transform:none}
  12.5%{transform:scale(1.15, 1.05) rotate(-4deg) translate3d(2px, -2px, 0)}
  37.5%{transform:scale(0.95, 1.1) rotate(1deg) translate3d(-1px, 2px, 0)}
  62.5%{transform:scale(1.05, 0.9) rotate(4deg) translate3d(1px, 1px, 0)}
  87.5%{transform:scale(0.96, 1.04) rotate(5deg) translate3d(-2px, -1px, 0)}
}
@keyframes sprinkle-wiggle-1{
  0%, 25%, 50%, 75%, 100%{transform:none}
  12.5%{transform:skew(0, -10deg) scale(1.15, 1.05) rotate(-4deg) translate3d(2px, -2px, 0)}
  37.5%{transform:skew(-10deg, 0) scale(0.95, 1.1) rotate(1deg) translate3d(-1px, 2px, 0)}
  62.5%{transform:skew(0, -10deg) scale(1.05, 0.9) rotate(4deg) translate3d(1px, 1px, 0)}
  87.5%{transform:skew(-10deg, 0) scale(0.96, 1.04) rotate(5deg) translate3d(-2px, -1px, 0)}
}
@keyframes sprinkle-wiggle-2{
  0%, 25%, 50%, 75%, 100%{transform:none}
  12.5%{transform:scale(1.15, 1.05) rotate(-6deg) translate3d(2px, -2px, 0)}
  37.5%{transform:scale(0.95, 1.1) rotate(10deg) translate3d(-1px, 2px, 0)}
  62.5%{transform:scale(1.05, 0.9) rotate(4deg) translate3d(1px, 1px, 0)}
  87.5%{transform:scale(0.96, 1.04) rotate(5deg) translate3d(-2px, -1px, 0)}
}
@keyframes sprinkle-wiggle-3{
  0%, 25%, 50%, 75%, 100%{transform:none}
  12.5%{transform:scale(1.15, 1.05) rotate(-4deg) translate3d(10px, -2px, 0)}
  37.5%{transform:scale(0.95, 1.1) rotate(1deg) translate3d(-1px, 2px, 0)}
  62.5%{transform:scale(1.05, 0.9) rotate(4deg) translate3d(10px, 1px, 0)}
  87.5%{transform:scale(0.96, 1.04) rotate(5deg) translate3d(-2px, -1px, 0)}
}
@keyframes sprinkle-wiggle-4{
  // 0%, 25%, 50%, 75%, 100%{transform:none}
  12.5%{transform:skew(0, -5deg) scale(1.15, 1.05) rotate(-10deg) translate3d(2px, -2px, 0)}
  37.5%{transform:skew(0, 10deg) scale(0.95, 1.2) rotate(8deg) translate3d(-1px, 2px, 0)}
  62.5%{transform:skew(0, -10deg) scale(1.1, 0.9) rotate(-8deg) translate3d(1px, 1px, 0)}
  87.5%{transform:skew(0, 5deg) scale(0.96, 1.04) rotate(5deg) translate3d(-2px, -1px, 0)}
}
@keyframes sprinkle-wiggle-5{
  0%, 25%, 50%, 75%, 100%{transform:none}
  12.5%{transform:skew(0, -30deg) rotate(5deg) translate3d(10px, -20px, 0)}
  37.5%{transform:skew(0, -30deg) rotate(5deg) translate3d(20px, 2px, 0)}
  62.5%{transform:skew(0, -30deg) rotate(5deg) translate3d(10px, 10px, 0)}
  87.5%{transform:skew(0, -30deg) rotate(5deg) translate3d(20px, -1px, 0)}
}
@keyframes sprinkle-wiggle-6{
  0%, 25%, 50%, 75%, 100%{transform:none}
  12.5%{transform:skew(15deg, 0) scale(1.1, 0.95) rotate(-4deg) translate3d(2px, -2px, 0)}
  37.5%{transform:skew(15deg, 0) scale(0.9, 1.15) rotate(1deg) translate3d(-1px, 2px, 0)}
  62.5%{transform:skew(15deg, 0) scale(1.05, 0.9) rotate(4deg) translate3d(1px, 1px, 0)}
  87.5%{transform:skew(15deg, 0) scale(0.96, 1.04) rotate(5deg) translate3d(-2px, -1px, 0)}
}
@keyframes sprinkle-wiggle{
  0%, 25%, 50%, 75%, 100%{transform:none}
  12.5%{transform:scale(1.15, 1.05) rotate(-4deg) translate3d(2px, -2px, 0)}
  37.5%{transform:scale(0.95, 1.1) rotate(1deg) translate3d(-1px, 2px, 0)}
  62.5%{transform:scale(1.05, 0.9) rotate(4deg) translate3d(1px, 1px, 0)}
  87.5%{transform:scale(0.96, 1.04) rotate(5deg) translate3d(-2px, -1px, 0)}
}
@keyframes button-wiggle{
  0%, 25%, 50%, 75%, 100%{transform:none}
  12.5%{transform: rotate(-3deg) translate3d(2px, -2px, 0)}
  37.5%{transform: rotate(1deg) translate3d(-1px, 2px, 0)}
  62.5%{transform: rotate(-4deg) translate3d(1px, 1px, 0)}
  87.5%{transform: rotate(5deg) translate3d(-2px, -1px, 0)}
}

@keyframes cta-hover{
  0%, 100%{transform:scale(1, 1) rotate(0deg) translateZ(0)}
  21%{transform:scale(1.76, 0.46) rotate(-9deg) translateZ(0)}
  50%{transform:scale(0.82, 1.21) rotate(13deg) translateZ(0)}}
</style>
