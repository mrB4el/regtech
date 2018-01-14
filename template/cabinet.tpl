<div class="cabinet">
    <h1>Кабинет пользователя <?php echo $this->profile->login; ?></h1>
    <div class="text">Список ваших покупок</div>
    
    <div class="contblock">
        <div class="text">Добавить покупку</div>
        <form method="POST">
            <input name="do" value="api" type="hidden"/>
            <input name="type" value="thing" type="hidden"/>
            <input name="action" value="connect" type="hidden"/>

            <input name="id" type="text" maxlength="20" size="15" placeholder="id товара"/>               
            <input class="next_but" type="submit" value="Передать информацию" />
       </form>
    </div>

    <div class="contblock">
            <div class="text">Поиск покупки</div>
            <form method="POST">
                <input name="do" value="api" type="hidden"/>
                <input name="type" value="thing" type="hidden"/>
                <input name="action" value="search" type="hidden"/>
    
                <input name="id" type="text" maxlength="20" size="15" placeholder="id товара"/>               
                <input class="next_but" type="submit" value="Передать информацию" />
           </form>
    </div>

    <div class="contblock">
        <div class="text">Список покупок</div>
        <div class="text">
            <?php 
                if(isset($this->thigs)) { 
                    echo 'none'; 
                }else{ 
                    var_dump($this->things); 
                }
            ?>
        </div>
    </div>
    <a href="?do=reset">Выход</a>
</div>
