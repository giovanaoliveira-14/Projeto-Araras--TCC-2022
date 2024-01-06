class MobileNavbar{
    constructor(mobileMenu, menu, menuLinks){
        // Referenciando os elementos
        this.mobileMenu = document.querySelector(mobileMenu);
        this.menu = document.querySelector(menu);
        this.menuLinks = document.querySelectorAll(menuLinks);
        this.activeClass = "active";

        this.handleClick = this.handleClick.bind(this);
    }

    // Referente a animação dos links
    animateLinks(){
        this.menuLinks.forEach((link, index) => {
            link.style.animation
            ?(link.style.animation = "")
            :(link.style.animation = ` menuLinksFade 0.5s ease forwards ${index / 7 + 0.3}s`);
        });
    }

    // Referente ao comportamento da lista e da animação dos links e do icone
    handleClick(){
        this.menu.classList.toggle(this.activeClass);
        this.mobileMenu.classList.toggle(this.activeClass);
        this.animateLinks();
    }

    // Quando o icone do menu encolhido for clicado
    addClickEvent(){
        this.mobileMenu.addEventListener("click", this.handleClick);
    }

    // Se o icone for clicado, retornar as ações
    init(){
        if(this.mobileMenu){
            this.addClickEvent();
        }
        return this;
    }

}

// Constante no qual estará os elementos que irão aparecer no menu encolhido
const mobileNavbar = new MobileNavbar(
    ".mobile-menu",
    ".menu",
    ".menu li",
);
mobileNavbar.init();