<div id="content">
	<h2>Taimed</h2>
	<table id="crops">
		<thead class="row-odd">
			<tr>
				<th>ID</th>
				<th>Nimi</th>
				<th>Kasvab väljas?</th>
				<th>Kasvab toas?</th>
				<th>On söödav?</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$crops = array(
				array(
					'id' => 1,
					'name' => 'lemon',
					'grows_outdoors' => true,
					'grows_indoors' => true,
					'is_edible' => true 
				),
				array(
					'id' => 2,
					'name' => 'tomato',
					'grows_outdoors' => true,
					'grows_indoors' => true,
					'is_edible' => true 
				),
				array(
					'id' => 3,
					'name' => 'potato',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => true 
				),
				array(
					'id' => 4,
					'name' => 'broccoli',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => true 
				),
				array(
					'id' => 5,
					'name' => 'walnut',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => true 
				),
				array(
					'id' => 6,
					'name' => 'chrysanthemum',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => false 
				),
				array(
					'id' => 7,
					'name' => 'banana',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => true 
				),
				array(
					'id' => 8,
					'name' => 'rose',
					'grows_outdoors' => true,
					'grows_indoors' => true,
					'is_edible' => false 
				),
				array(
					'id' => 9,
					'name' => 'mint',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => true 
				),
				array(
					'id' => 10,
					'name' => 'shiitake',
					'grows_outdoors' => true,
					'grows_indoors' => false,
					'is_edible' => true 
				),
				array(
					'id' => 11,
					'name' => 'aloe vera',
					'grows_outdoors' => true,
					'grows_indoors' => true,
					'is_edible' => true 
				) 
			);
			
			foreach ( $crops as $i => $crop ) {
				
				$rowClass = ($i % 2) ? 'row-odd' : 'row-even';
				
				echo '<tr class="' . $rowClass . '">';
				foreach ( $crop as $key => $value ) {
					
					if (is_bool($value)) {
						$value = $value ? 'jah' : 'ei';
					}
					
					echo '<td>' . $value . '</td>';
				}
				echo '</tr>';
			
			}
			?>
		</tbody>
	</table>
</div>