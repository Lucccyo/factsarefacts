<nav class="listBar">
    <div id="listBar-items">
        <ul class="listBar-nav">
            <div id="themeList">
                <li class="genre-item">
                <?php 
                if(isset($_SESSION))
                {
                    ?>
                        <a href="pageAccueil.php?actualPage=1" class="nav-link">
                            <i class="far fa-newspaper"></i>
                            <span class="link-text">@Actualités</span>
                        </a> 
                    <?php
                }else
                {
                    ?>
                        <a href="index.php?actualPage=1" class="nav-link">
                            <i class="far fa-newspaper"></i>
                            <span class="link-text">@Actualités</span>
                        </a> 
                    <?php
                }
                ?>  
                </li>

                <li class="genre-item">
                <?php 
                if(isset($_SESSION))
                {
                    ?>
                        <a href="pageAccueil.php?actualPage=2" class="nav-link">
                            <i class="fas fa-book"></i>
                            <span class="link-text">@Culture</span>
                        </a> 
                    <?php
                }else
                {
                    ?>
                        <a href="index.php?actualPage=2" class="nav-link">
                            <i class="fas fa-book"></i>
                            <span class="link-text">@Culture</span>
                        </a> 
                    <?php
                }
                ?>  
                </li>

                <li class="genre-item">
                <?php 
                if(isset($_SESSION))
                {
                    ?>
                        <a href="pageAccueil.php?actualPage=3" class="nav-link">
                            <i class="fas fa-globe-americas"></i>
                            <span class="link-text">@Géopolitique</span>
                        </a> 
                    <?php
                }else
                {
                    ?>
                        <a href="index.php?actualPage=3" class="nav-link">
                            <i class="fas fa-globe-americas"></i>
                            <span class="link-text">@Géopolitique</span>
                        </a> 
                    <?php
                }
                ?>  
                </li>

                <li class="genre-item">
                <?php 
                if(isset($_SESSION))
                {
                    ?>
                        <a href="pageAccueil.php?actualPage=4" class="nav-link">
                            <i class="fas fa-landmark"></i>
                            <span class="link-text">@Histoire</span>
                        </a> 
                    <?php
                }else
                {
                    ?>
                        <a href="index.php?actualPage=4" class="nav-link">
                            <i class="fas fa-landmark"></i>
                            <span class="link-text">@Histoire</span>
                        </a> 
                    <?php
                }
                ?>  
                </li>

                <li class="genre-item">
                <?php 
                if(isset($_SESSION))
                {
                    ?>
                        <a href="pageAccueil.php?actualPage=5" class="nav-link">
                            <i class="fas fa-running"></i>
                            <span class="link-text">@Mode de vie</span>
                        </a> 
                    <?php
                }else
                {
                    ?>
                        <a href="index.php?actualPage=5" class="nav-link">
                            <i class="fas fa-running"></i>
                            <span class="link-text">@Mode de vie</span>
                        </a> 
                    <?php
                }
                ?>  
                </li>

                <li class="genre-item">
                <?php 
                if(isset($_SESSION))
                {
                    ?>
                        <a href="pageAccueil.php?actualPage=6" class="nav-link">
                            <i class="fas fa-keyboard"></i>
                            <span class="link-text">@Numérique</span>
                        </a> 
                    <?php
                }else
                {
                    ?>
                        <a href="index.php?actualPage=6" class="nav-link">
                            <i class="fas fa-keyboard"></i>
                            <span class="link-text">@Numérique</span>
                        </a> 
                    <?php
                }
                ?>  
                </li>

                <li class="genre-item">
                <?php 
                if(isset($_SESSION))
                {
                    ?>
                        <a href="pageAccueil.php?actualPage=7" class="nav-link">
                            <i class="fas fa-atom"></i>
                            <span class="link-text">@Sciences</span>
                        </a> 
                    <?php
                }else
                {
                    ?>
                        <a href="index.php?actualPage=7" class="nav-link">
                            <i class="fas fa-atom"></i>
                            <span class="link-text">@Sciences</span>
                        </a> 
                    <?php
                }
                ?>  
                </li>

            </div>
        </ul>
        <div class="placePost">
            <div id="postButton">
                <?php
                    if(isset($_SESSION))
                    {
                        ?>
                            <a href="newPost1.php">Nouveau post</a>
                        <?php
                    }else{
                        ?>
                            <a data-modal-target="#modal" style="cursor: pointer;">Nouveau Post</a>
                                <div class="modal" id="modal">
                                    <div class="modal-header">
                                <div class="title">Attention</div>
                            <button data-close-button class="close-button">&times;</button>
                                </div>
                                    <div class="modal-body">
                                        Merci de vous connecter afin de pouvoir poster un article.
                                    </div>
                                </div>
                            <div id="overlay"></div>
                        <?php
                    }
                ?>  
            </div>
        </div>          
    </div> 
</nav>


<script>
    const openModalButtons = document.querySelectorAll('[data-modal-target]')
    const closeModalButtons = document.querySelectorAll('[data-close-button]')
    const overlay = document.getElementById('overlay')

    openModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = document.querySelector(button.dataset.modalTarget)
            openModal(modal)
        })
    })

    overlay.addEventListener('click', () => {
        const modals = document.querySelectorAll('.modal.active')
        modals.forEach(modal => {
            closeModal(modal)
        })
    })

    closeModalButtons.forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal')
            closeModal(modal)
        })
    })


    function openModal(modal) {
        if(modal == null)
            return
        modal.classList.add('active')
        overlay.classList.add('active')
    }

    function closeModal(modal) {
        if(modal == null)
            return
        modal.classList.remove('active')
        overlay.classList.remove('active')
    }
</script>
