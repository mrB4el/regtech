<div class="cabinet">
    <h1>Панель управления</h1>
    <div class="text">Список ваших покупок</div>
    
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
            <div class="text">Товар продан</div>
            <form method="POST">
                <input name="do" value="api" type="hidden"/>
                <input name="type" value="thing" type="hidden"/>
                <input name="action" value="bought" type="hidden"/>
    
                <input name="id" type="text" maxlength="20" size="15" placeholder="id товара"/>               
                <input class="next_but" type="submit" value="Передать информацию" />
           </form>
    </div>
    <div class="contblock">
        <div class="text">Добавить товар</div>
        <form method="GET">
            <input name="do" value="api" type="hidden"/>
            <input name="type" value="thing" type="hidden"/>
            <input name="action" value="add" type="hidden"/>
                   
            <input name="name" type="text" maxlength="20" size="15" placeholder="название"/> 
            <input name="brand" type="text" maxlength="20" size="15" placeholder="бренд"/>
            <input name="serialnumber" type="text" maxlength="20" size="15" placeholder="серийный номер"/>
            <input name="guarantee_period" type="text" maxlength="20" size="15" placeholder="гарантия"/>
            <input name="description" type="text" maxlength="20" size="15" placeholder="описание"/>
            <input name="photo" type="text" maxlength="20" size="15" placeholder="фотография"/>            

            <input class="next_but" type="submit" value="Передать информацию" />
        </form>
    </div>
</div>
