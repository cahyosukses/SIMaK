<?php
if (!Yii::app()->user->isGuest) {
    if (Yii::app()->user->name == 'admin') {
        $dependency = new CDbCacheDependency('SELECT max(updated_date) AS t FROM m_module;');
    } else
        $dependency = new CDbCacheDependency('SELECT max(um.updated_date) AS t FROM s_user_module um WHERE um.s_user_id =' . Yii::app()->user->id);


    if (!Yii::app()->cache->get('hierarchy1m1' . Yii::app()->user->id)) {
        if (Yii::app()->user->name == 'admin') {
            $Hierarchy = menu::model()->findAll(['condition' => 'parent_id = \'0\' AND (name = \'m1\' OR name = \'m0\') ', 'order' => 'sort']);
        } else {

            $criteria = new CDbCriteria;
            $criteria->with = ['user'];
            $criteria->compare('parent_id', 0);
            $criteria->compare('user.s_user_id', Yii::app()->user->id);
            $criteria->order = 't.sort';
            $criteria1 = new CDbCriteria;
            $criteria1->compare('name', 'm1', true, 'OR');
            $criteria1->compare('name', 'm0', true, 'OR');
            $criteria->mergeWith($criteria1);

            $Hierarchy = menu::model()->cache(3600, $dependency)->findAll($criteria);
        }
        Yii::app()->cache->set('hierarchy1m1' . Yii::app()->user->id, $Hierarchy, 86400, $dependency);
    } else
        $Hierarchy = Yii::app()->cache->get('hierarchy1m1' . Yii::app()->user->id);

    if (!Yii::app()->cache->get('hierarchy2m1' . Yii::app()->user->id)) {
        foreach ($Hierarchy as $Hierarchy) {
            $models = menu::model()->findByPk($Hierarchy->id);
            $items[] = $models->getListed();
        }
        Yii::app()->cache->set('hierarchy2m1' . Yii::app()->user->id, $items, 86400, $dependency);
    } else
        $items = Yii::app()->cache->get('hierarchy2m1' . Yii::app()->user->id);
}
?>

<ul class="sidebar-menu">
	<li class="header">Menu Utama</li>
	<?php
		foreach($items as $item)
		{
			echo "<li class=\"treeview\">";
			echo "<a href=\"".$this->createUrl("/".$item['url'][0])."\"><span>".$item['label']."</span> <i class=\"fa fa-angle-left pull-right\"></i></a>";
			if(isset($item['items']))
			{
				echo "<ul class=\"treeview-menu\">";
				foreach($item['items']as $sub)
				{
					echo "<li><a href=\"".$this->createUrl("/".$sub['url'][0])."\">".$sub['label']."<i class=\"fa fa-".$sub['icon']." pull-right\"></i></a></li>";
				}
				echo "</ul>";
			}
			echo "</li>";
		}
	?>
</ul><!-- /.sidebar-menu -->