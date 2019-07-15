<?php
class funciones {

	private $db;
	function __construct() {
		require_once '../conexion/conexion.php';
		$this->db = new conexion();

	}

	//==================== listado de insituciones  ===========================
	public function lista_inst() {
		$sql = "select id_institucion, institucion, monitor from `institucion` where estado=1 ";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;
	}

	//==================== listado de comunas  ===========================
	public function lista_comuna() {
		$sql = "select comuna.id_comuna, comuna.comuna, provincia.provincia, region.region
				from `comuna` 
				INNER join provincia on comuna.id_provincia = provincia.id_provincia
				inner join region on provincia.id_region = region.id_region 
				order by comuna asc";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== listado deperfil  ===========================
	public function lista_perfil() {
		$sql = "select id_perfil, perfil from `perfil` where id_perfil <> 1 order by perfil asc";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== INSERTAR USUARIO ===========================

	public function ingresar_usuario($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido,
		$correo, $celular, $fijo, $comuna, $institucion, $perfil, $clave, $direccion, $rut) {
		require_once '../modell/madmin.php';

		try {
			$lista = new funciones_BD();
			$list = $lista->ingresar_usuario($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido,
				$correo, $celular, $fijo, $comuna, $institucion, $perfil, $clave, $direccion, $rut);

			if ($lista) {
				return true;
			} else {

				return false;
			}
		} catch (Exception $e) {
			echo "<script>alert('ERROR AL INGRESAR ACTIVIDAD NIVEL 1');</script>";
		}
	}

	//==================== listado usuarios  ===========================
	public function lista_usuario() {
		$sql = "select usuario.primer_nombre, usuario.primer_apellido, usuario.id_perfil, perfil.perfil, usuario.id_institucion,
          usuario.segundo_nombre, usuario.segundo_apellido, usuario.correo, usuario.celular, usuario.fijo,
          usuario.id_institucion, usuario.id_comuna, institucion.institucion, comuna.comuna, provincia.provincia,
          region.region, usuario.rut , usuario.estado

          from usuario

          inner join perfil on usuario.id_perfil = perfil.id_perfil
          inner join institucion on usuario.id_institucion = institucion.id_institucion
          inner join comuna on usuario.id_comuna = comuna.id_comuna
          inner join provincia on comuna.id_provincia = provincia.id_provincia
          inner join region on provincia.id_region = region.id_region
          where usuario.estado = 1";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== buscar usuarios  ===========================
	public function buscar_usuario($id) {
		$sql = "select usuario.primer_nombre, usuario.primer_apellido, usuario.id_perfil, perfil.perfil, usuario.id_institucion,
          usuario.segundo_nombre, usuario.segundo_apellido, usuario.correo, usuario.celular, usuario.fijo,
          usuario.id_institucion, usuario.id_comuna, institucion.institucion, comuna.comuna, provincia.provincia,
          region.region, usuario.rut, usuario.direccion, usuario.id_comuna

          from usuario

          inner join perfil on usuario.id_perfil = perfil.id_perfil
          inner join institucion on usuario.id_institucion = institucion.id_institucion
          inner join comuna on usuario.id_comuna = comuna.id_comuna
          inner join provincia on comuna.id_provincia = provincia.id_provincia
          inner join region on provincia.id_region = region.id_region
          where usuario.estado = 1 and
          usuario.rut = '" . $id . "'

          ";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//======= ACTUALIZAR USUARIO=========
	public function actualizar_usuario($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $correo,
		$celular, $fijo, $rut, $comuna, $institucion, $perfil, $clave, $direccion) {
		require_once '../modell/madmin.php';
		try {
			$lista = new funciones_BD();
			$list = $lista->actualizar_usuario($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $correo,
				$celular, $fijo, $rut, $comuna, $institucion, $perfil, $clave, $direccion);

			if ($lista) {
				return true;

			} else {
				return false;
			}
		} catch (Exception $e) {
			echo "<script>alert('ERROR AL ACTUALIZAR');</script>";
		}
	}

	//======= ELIMINAR USUARIO=========
	public function eliminar_usuario($rut) {
		require_once '../modell/madmin.php';
		try {
			$lista = new funciones_BD();
			$list = $lista->eliminar_usuario($rut);

			if ($lista) {
				return true;

			} else {
				return false;
			}
		} catch (Exception $e) {
			echo "<script>alert('ERROR AL ELIMINAR');</script>";
		}
	}

//==================== INSERTAR INSTITUCION ===========================

	public function ingresar_institucion($institucion, $monitor) {
		require_once '../modell/madmin.php';

		try {
			$lista = new funciones_BD();
			$list = $lista->ingresar_institucion($institucion, $monitor);

			if ($lista) {
				return true;
			} else {

				return false;
			}
		} catch (Exception $e) {
			echo "<script>alert('ERROR AL INGRESAR USUARIO NIVEL 1');</script>";
		}
	}

	//======= ACTUALIZAR INSTITUCION=========
	public function actualizar_ins($id_institucion, $institucion, $monitor) {
		require_once '../modell/madmin.php';
		try {
			$lista = new funciones_BD();
			$list = $lista->actualizar_ins($id_institucion, $institucion, $monitor);

			if ($lista) {
				return true;

			} else {
				return false;
			}
		} catch (Exception $e) {
			echo "<script>alert('ERROR AL ACTUALIZAR');</script>";
		}
	}

//======= ELIMINAR INSTITUCION=========
	public function eliminar_ins($id_institucion) {
		require_once '../modell/madmin.php';
		try {
			$lista = new funciones_BD();
			$list = $lista->eliminar_ins($id_institucion);

			if ($lista) {
				return true;

			} else {
				return false;
			}
		} catch (Exception $e) {
			echo "<script>alert('ERROR AL ELIMINAR');</script>";
		}
	}

	//==================== listado usuarios  ===========================
	public function lista_usuario_inst($id_institucion) {
		$sql = "SELECT usuario.primer_nombre, usuario.primer_apellido, usuario.id_perfil, perfil.perfil, usuario.id_institucion,
		usuario.segundo_nombre, usuario.segundo_apellido, usuario.correo, usuario.celular, usuario.fijo,
		usuario.id_institucion, usuario.id_comuna, institucion.institucion, comuna.comuna, provincia.provincia,
		region.region, usuario.rut , usuario.estado

		from usuario

		inner join perfil on usuario.id_perfil = perfil.id_perfil
		inner join institucion on usuario.id_institucion = institucion.id_institucion
		inner join comuna on usuario.id_comuna = comuna.id_comuna
		inner join provincia on comuna.id_provincia = provincia.id_provincia
		inner join region on provincia.id_region = region.id_region
		 where usuario.estado = 1 and usuario.id_institucion = '".$id_institucion."'";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//======= ACTUALIZAR USUARIO DE INSITTUCION DETERMINADA=========
	public function actualizar_usuario_ins($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $correo,
		$celular, $fijo, $rut, $comuna, $institucion, $perfil, $clave, $direccion) {
		require_once '../modell/madmin.php';
		try {
			$lista = new funciones_BD();
			$list = $lista->actualizar_usuario_ins($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $correo,
				$celular, $fijo, $rut, $comuna, $institucion, $perfil, $clave, $direccion);

			if ($lista) {
				return true;

			} else {
				return false;
			}
		} catch (Exception $e) {
			echo "<script>alert('ERROR AL ACTUALIZAR');</script>";
		}
	}

	//==================== listado de nacionalidades ==========================
	public function lista_nacionalidad() {
		$sql = "select id, CONCAT(nombre, ' - ', iso3166a2) As nombre, iso3166a2 from `nacionalidad` order by nombre asc";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;
	}

	//==================== listado de estados de delincuente==========================
	public function lista_estado_delincunete() {
		$sql = "select id_estado_delincuente as id, CONCAT(estado_delincuente,' - Codigo: ',codigo) as nombre from `estado_delincuente` order by estado_delincuente asc";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;
	}

//genera un nuevo delincuente
	public function nuevo_delincuente($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $celular, $fijo, $rut, $comuna, $nacionalidad, $direccion, $genero, $id_estado_delincuente, $ingresar, $apado) {

		require_once '../modell/madmin.php';
		try {
			$lista = new funciones_BD();
			$list = $lista->nuevo_delincuente($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $celular, $fijo, $rut, $comuna, $nacionalidad, $direccion, $genero, $id_estado_delincuente, $ingresar, $apado);

			if ($lista) {
				return true;

			} else {
				return false;
			}
		} catch (Exception $e) {
			echo "<script>alert('ERROR AL ACTUALIZAR');</script>";
		}
	}

	//==================== listado delincuente  ===========================
	public function lista_delincuente() {
		$sql = "select delincuente.rut, delincuente.primer_nombre, delincuente.segundo_nombre, delincuente.primer_apellido, delincuente.segundo_apellido,
            nacionalidad.nombre, estado_delincuente.estado_delincuente, comuna.comuna, provincia.provincia, region.region
            from `delincuente`
            inner join estado_delincuente on delincuente.id_estado_delincuente = estado_delincuente.id_estado_delincuente
            inner join nacionalidad on delincuente.id_nacionalidad = nacionalidad.id
            inner join comuna on delincuente.id_comuna = comuna.id_comuna
            inner join provincia on comuna.id_provincia = provincia.id_provincia
            inner join region on provincia.id_region = region.id_region
            where delincuente.estado = 1
            order by delincuente.rut desc";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== listado delitos  ===========================
	public function lista_delitos() {
		$sql = "select id_delito, delito, descripcion FROM `delito` where estado= 1";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//genera un nuevo delito delincunte
	public function nuevo_delito_delincuente($rut, $comuna, $direccion, $fecha, $hora, $descpcion, $delito, $tipo) {

		require_once '../modell/madmin.php';
		try {
			$lista = new funciones_BD();
			$list = $lista->nuevo_delito_delincuente($rut, $comuna, $direccion, $fecha, $hora, $descpcion, $delito, $tipo);

			if ($lista) {
				return true;

			} else {
				return false;
			}
		} catch (Exception $e) {
			echo "<script>alert('ERROR AL ACTUALIZAR');</script>";
		}
	}

	//==================== buscar delitos delincuente  ===========================
	public function buscar_delito_delincuente($rut) {
		$sql = "SELECT delito_delincuente.fecha, delito_delincuente.hora, delito.delito, comuna.comuna, delito_delincuente.id_delincuente, delito_delincuente.tipo
                FROM `delito_delincuente`
                inner join delito on delito_delincuente.id_delito = delito.id_delito
                inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
                WHERE delito_delincuente.estado = 1 and delito_delincuente.id_delincuente ='" . $rut . "'
                order by delito_delincuente.fecha desc
          ";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== listado delitos  ===========================
	public function cuenta_cantida_delitos($rut) {
		$sql = "SELECT COUNT(tipo)as delito FROM `delito_delincuente`
                    where tipo = 'delito' and delito_delincuente.id_delincuente = '" . $rut . "'
                    GROUP by tipo";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== listado delitos  ===========================
	public function cuenta_cantida_contorl($rut) {
		$sql = "SELECT COUNT(tipo)as control FROM `delito_delincuente`
                    where tipo = 'control' and delito_delincuente.id_delincuente = '" . $rut . "'
                    GROUP by tipo";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

//==================== listado de comunas - provincia - region ===========================
	public function lista_comuna_prov_reg() {
		$sql = "select comuna.id_comuna, comuna.comuna, provincia.provincia, region.region from `comuna`
                inner join provincia on comuna.id_provincia = provincia.id_provincia
                inner join region on provincia.id_region = region.id_region
                order by comuna asc";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== listado de comunas - delitos ===========================
	public function reporte_comuna_delito($comuna) {
		$sql = "SELECT delito_delincuente.id_delincuente,  delito_delincuente.descripcion, delito_delincuente.fecha, delito_delincuente.hora, delito_delincuente.tipo, comuna.comuna, delincuente.rut, delincuente.primer_nombre, delincuente.primer_apellido, delito.delito, delito_delincuente.direccion
        from `delito_delincuente`
        inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
        inner join delincuente on delito_delincuente.id_delincuente = delincuente.rut
        inner join delito on delito_delincuente.id_delito = delito.id_delito
        where delito_delincuente.id_comuna = '" . $comuna . "'";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

//==================== listado dlitos por comuna ===========================
	public function cuenta_comuna_delitos($comuna) {
		$sql = "SELECT COUNT(tipo)as delito FROM `delito_delincuente`
                    where tipo = 'delito' and delito_delincuente.id_comuna = '" . $comuna . "'
                    GROUP by tipo";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== listado comuna delitos  ===========================
	public function cuenta_comuna_contorl($comuna) {
		$sql = "SELECT COUNT(tipo)as control FROM `delito_delincuente`
                    where tipo = 'control' and delito_delincuente.id_comuna = '" . $comuna . "'
                    GROUP by tipo";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

//==================== listado comuna delitos  ===========================
	public function cuenta_comuna_mxa5($comuna) {
		$sql = "select delito_delincuente.id_delincuente,  delito_delincuente.descripcion, delito_delincuente.fecha, delito_delincuente.hora, delito_delincuente.tipo,
            comuna.comuna, delincuente.rut, delincuente.primer_nombre, delincuente.primer_apellido, delito.delito, count(delito_delincuente.id_delito) as total
            from `delito_delincuente`
            inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
            inner join delincuente on delito_delincuente.id_delincuente = delincuente.rut
            inner join delito on delito_delincuente.id_delito = delito.id_delito
            where delito_delincuente.id_comuna = '" . $comuna . "'
            GROUP by delito_delincuente.id_delito
            ORDER by total desc
            limit 5";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== listado delicuentes  ===========================
	public function top_delincuentes($comuna) {
		$sql = "select delito_delincuente.id_delincuente,  delito_delincuente.descripcion, delito_delincuente.fecha, delito_delincuente.hora, delito_delincuente.tipo, comuna.comuna, delincuente.rut, delincuente.primer_nombre, delincuente.primer_apellido, delito.delito, count(delito_delincuente.id_delincuente) as total,  delincuente.apodo
            from `delito_delincuente`
            inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
            inner join delincuente on delito_delincuente.id_delincuente = delincuente.rut
            inner join delito on delito_delincuente.id_delito = delito.id_delito
            where delito_delincuente.id_comuna = '" . $comuna . "'
            GROUP by delito_delincuente.id_delincuente
            ORDER by total desc
            limit 5";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== listado deltos por fecha y sector  ===========================
	public function sector_fecha($inicio, $fin) {
		$sql = "SELECT  delito_delincuente.id_delito_delincuente, delito_delincuente.id_delincuente, delito_delincuente.id_delito, delito_delincuente.id_comuna,delito_delincuente.tipo, delito.delito , count(delito.delito) as delito, delito.delito as nombre, comuna.comuna, comuna.id_sector, sector.sector
                    FROM `delito_delincuente`
                    inner join delito on delito_delincuente.id_delito = delito.id_delito
                    inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
                    left JOIN sector on comuna.id_sector = sector.id_sector
                    where fecha BETWEEN '" . $inicio . "' and '" . $fin . "'
                    GROUP by delito ";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== listado cuenta delitos por mes ===========================
	public function delito_mes_year($inicio, $fin) {
		$sql = "SELECT COUNT(*), MonthName(delito_delincuente.fecha), YEAR (delito_delincuente.fecha) as year
                      FROM `delito_delincuente`
                      where fecha BETWEEN '" . $inicio . "' and '" . $fin . "'
                      GROUP by MonthName(delito_delincuente.fecha)";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== grafico por sector y comuna fechas ===========================
	public function grafico_sector_comuna($inicio, $fin) {
		$sql = "SELECT day(delito_delincuente.fecha) as day, month(delito_delincuente.fecha)-1 as month, year(delito_delincuente.fecha) year, COUNT(delito_delincuente.id_delito) as total,  comuna.comuna, comuna.id_sector, comuna.id_comuna, sector.sector
              FROM `delito_delincuente`
              inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
              left JOIN sector on comuna.id_sector = sector.id_sector
              where fecha BETWEEN '" . $inicio . "' and '" . $fin . "'
              GROUP by fecha";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== listado deltos por fecha y sector  ===========================
	public function cantidad_delito_comuna($inicio, $fin) {
		$sql = "SELECT day(delito_delincuente.fecha) as day, month(delito_delincuente.fecha)-1 as month, year(delito_delincuente.fecha) year, COUNT(delito_delincuente.id_delito) as total,  comuna.comuna, comuna.id_sector, comuna.id_comuna, sector.sector
              FROM `delito_delincuente`
              inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
              left JOIN sector on comuna.id_sector = sector.id_sector
              where fecha BETWEEN '" . $inicio . "' and '" . $fin . "'
              GROUP by comuna.comuna";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== grafico por sector y comuna fechas ===========================
	public function grafico_sector_comuna1($inicio, $fin) {
		$sql = "SELECT day(delito_delincuente.fecha) as day, month(delito_delincuente.fecha)-1 as month, year(delito_delincuente.fecha) year, COUNT(delito_delincuente.id_delito) as total,  comuna.comuna, comuna.id_sector, comuna.id_comuna, sector.sector
              FROM `delito_delincuente`
              inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
              left JOIN sector on comuna.id_sector = sector.id_sector
              where fecha BETWEEN '" . $inicio . "' and '" . $fin . "'
              GROUP by fecha
              limit 5
              ";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== grafico por sector y comuna fechas ===========================
	public function grafico_sector_comuna2($inicio, $fin, $com) {
		$sql = "SELECT day(delito_delincuente.fecha) as day, month(delito_delincuente.fecha)-1 as month, year(delito_delincuente.fecha) year, COUNT(delito_delincuente.id_delito) as total,  comuna.comuna, comuna.id_sector, comuna.id_comuna, sector.sector
              FROM `delito_delincuente`
              inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
              left JOIN sector on comuna.id_sector = sector.id_sector
              where fecha BETWEEN '" . $inicio . "' and '" . $fin . "'  and delito_delincuente.id_comuna = '" . $com . "'
              GROUP by fecha
              ORDER by fecha, total asc
              limit 5
              ";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

//muestra los ultimos 12 meses
	public function sector_filtro($id_sector) {

		$sql = "SELECT day(delito_delincuente.fecha) as day, month(delito_delincuente.fecha)-1 as month, 
		year(delito_delincuente.fecha) year, delito_delincuente.fecha, COUNT(delito_delincuente.id_delito) as total, 
		comuna.comuna, comuna.id_sector, comuna.id_comuna, sector.sector, delito.delito
              FROM `delito_delincuente`
              inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
              inner join delito on delito_delincuente.id_delito = delito.id_delito
              left JOIN sector on comuna.id_sector = sector.id_sector
              where delito_delincuente.fecha >= date_sub(curdate(), interval 12 month) and sector.id_sector = '" . $id_sector . "'
              GROUP by delito.delito, comuna.comuna
              order by delito_delincuente.fecha desc
              ";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);

		}
		return $datos;

	}

//filtra por sector genera lista en frontend
	public function sector() {

		$sql = "SELECT sector, id_sector FROM `sector`";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);

		}
		return $datos;

	}

//muestra los ultimos 12 meses lineal de tiempo grafico
	public function sector_historico($id_sector) {

		$sql = "SELECT day(delito_delincuente.fecha) as day, month(delito_delincuente.fecha)-1 as month, year(delito_delincuente.fecha) year, delito_delincuente.fecha, COUNT(delito_delincuente.id_delito) as total,  comuna.comuna, comuna.id_sector, comuna.id_comuna, sector.sector, delito.delito
              FROM `delito_delincuente`
              inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
              inner join delito on delito_delincuente.id_delito = delito.id_delito
              left JOIN sector on comuna.id_sector = sector.id_sector
              where delito_delincuente.fecha >= date_sub(curdate(), interval 12 month) and sector.id_sector = '" . $id_sector . "'
              GROUP by delito_delincuente.fecha
              order by delito_delincuente.fecha desc
              ";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);

		}
		return $datos;

	}

//muestra los ultimos 12 meses lineal de tiempo grafico
public function rankinkComuna() {

	$sql = "SELECT count(comuna.comuna) as total_comuna, delito_delincuente.id_delito, comuna.comuna 
			from delito_delincuente
			inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
			GROUP BY comuna.comuna 
			ORDER by total_comuna desc
			limit 5 
		  ";

	$stmt = $this->db->connect()->query($sql);
	$datos = array();
	while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$datos[] = array_map("utf8_encode", $fila);

	}
	return $datos;

}


//muestra los ultimos 12 meses lineal de tiempo grafico
public function rankinkSector() {

	$sql = "SELECT count(sector.id_sector) as total_sector, delito_delincuente.id_delito, sector.sector, 
					comuna.comuna, sector.sector    
					from delito_delincuente
					inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
					LEFT JOIN sector on comuna.id_sector = sector.id_sector 
					GROUP BY sector.sector 
					ORDER by total_sector desc
					limit 5 
		  ";

	$stmt = $this->db->connect()->query($sql);
	$datos = array();
	while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$datos[] = array_map("utf8_encode", $fila);

	}
	return $datos;
}

	//==================== conexion google  ===========================
	public function g() {
		$sql = "SELECT rut, clave FROM `usuario` where rut=0505";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;
	}

	//==================== marcado ene mapa  ===========================
	public function geolocalizacion_delito() {
		$sql = "SELECT delincuente.domicilio as direccion, comuna.comuna, delincuente.fecha, delincuente.latitud, delincuente.longitud,
		   delincuente.apodo
				FROM `delincuente` 
        inner join comuna on delincuente.id_comuna = comuna.id_comuna 
				order by `delincuente`.`fecha` DESC 
				LIMIT 300";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;
	}

//todos los delincuentes
//==================== marcado ene mapa  ===========================
	public function busqueda() {
		$sql = "SELECT delincuente.primer_nombre, delincuente.segundo_nombre, delincuente.primer_apellido, 
									delincuente.segundo_apellido, delincuente.domicilio, comuna.comuna, delincuente.rut
									FROM `delincuente` 
									inner join comuna on delincuente.id_comuna = comuna.id_comuna 
									";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;
	}


	//busqueda de delincuente por rut 
	public function busquedaParentesco($rut) {
		$sql = "SELECT delincuente.primer_nombre, delincuente.segundo_nombre, delincuente.primer_apellido, 
						delincuente.segundo_apellido, delincuente.domicilio, comuna.comuna, delincuente.rut
						FROM `delincuente` 
						inner join comuna on delincuente.id_comuna = comuna.id_comuna 
            where delincuente.estado = 1 and delincuente.rut ='".$rut."'
            order by delincuente.rut desc";

							$stmt = $this->db->connect()->query($sql);
							$datos = array();
							while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
								$datos[] = array_map("utf8_encode", $fila);
								// $datos[] =  $fila;
							}
							return $datos;

	}	


	//busqueda de delincuente por rut 
	public function busquedaSmilitud($primerApellido, $segundoApellido, $direccion) {
		$sql = "SELECT delincuente.primer_nombre, delincuente.segundo_nombre, delincuente.primer_apellido, 
						delincuente.segundo_apellido, delincuente.domicilio, comuna.comuna, delincuente.rut, count(delincuente.rut) as posibilidad 
						FROM `delincuente` 
						inner join comuna on delincuente.id_comuna = comuna.id_comuna 
						WHERE delincuente.primer_apellido = '".$primerApellido."' 
						or delincuente.segundo_apellido = '".$segundoApellido."' 
					  or delincuente.domicilio = '".$direccion."'
						GROUP BY delincuente.primer_nombre, delincuente.segundo_nombre, delincuente.primer_apellido, 
						delincuente.segundo_apellido, delincuente.domicilio, delincuente.rut
						 "; 

							$stmt = $this->db->connect()->query($sql);
							$datos = array();
							while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
								$datos[] = array_map("utf8_encode", $fila);
								// $datos[] =  $fila;
							}
							return $datos;
	}	

	//==================== dlincuente de la comuna con mayor  ===========================
	public function delincuentePrincipal() {
		$sql = "SELECT delito_delincuente.id_delito_delincuente, COUNT(id_delito) as total, delincuente.rut, delincuente.apodo 
						FROM `delito_delincuente`
						inner join delincuente on delito_delincuente.id_delincuente = delincuente.rut 
						where delincuente.estado = 1
						GROUP by delincuente.rut 
						order by total desc
						limit 1
						";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}


	//==================== dlincuente de la comuna con mayor  ===========================
	public function comunaPrincipal() {
		$sql = "SELECT delito_delincuente.id_delito, COUNT(id_delito) as total, delito_delincuente.id_comuna, 
						comuna.comuna 
						FROM `delito_delincuente` 
						inner join comuna on  delito_delincuente.id_comuna = comuna.id_comuna 
						GROUP by delito_delincuente.id_comuna  
						order by total desc
						limit 1
						";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}


	//==================== dlincuente de la comuna con mayor  ===========================
	public function diaPrincipal() {
		$sql = "SELECT delito_delincuente.id_delito, COUNT(fecha) as total, fecha
						FROM `delito_delincuente`
						group by fecha
						order by total desc
						limit 1
						";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	//==================== dlincuente de la comuna con mayor  ===========================
	public function delitoPrincipal() {
		$sql = "SELECT delito_delincuente.id_delito, COUNT(delito_delincuente.id_delito) as total, delito.delito,delito.id_delito
						FROM `delito_delincuente`
						inner join delito on delito_delincuente.id_delito = delito.id_delito 
						group by delito.id_delito
						order by total desc
						limit 1
						";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;

	}

	public function cuentaGoogle( $contador) {
		require_once '../modell/madmin.php';

		try {
			$lista = new funciones_BD();
			$lista->cuentaGoogle( $contador);

			if ($lista) {
				return true;
			} else {

				return false;
			}
		} catch (Exception $e) {
			echo "<script>alert('ERROR AL INGRESAR ACTIVIDAD NIVEL 1');</script>";
		}
	}

		//==================== listado de insituciones  ===========================
		public function lista_inst_a($id) {
			$sql = "select id_institucion, institucion, monitor from `institucion` where estado=1 and id_institucion = '".$id."'";
	
			$stmt = $this->db->connect()->query($sql);
			$datos = array();
			while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$datos[] = array_map("utf8_encode", $fila);
				// $datos[] =  $fila;
			}
			return $datos;
		}

	//crear un sector nuevo
	public function nuevSector($sector, $descripcion) {

		require_once '../modell/madmin.php';
		try {
			$lista = new funciones_BD();
			$lista->nuevSector($sector, $descripcion);

			if ($lista) {
				return true;

			} else {
				return false;
			}
		} catch (Exception $e) {
			
		}
	}
//==================== listado delitos  ===========================
		public function listaSectores() {
			$sql = "select id_sector, sector, descripcion FROM `sector` where estado= 1";
	
			$stmt = $this->db->connect()->query($sql);
			$datos = array();
			while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$datos[] = array_map("utf8_encode", $fila);
				// $datos[] =  $fila;
			}
			return $datos;
	
		}

//==================== agregar comuna===========================
public function agregarComuna($sector, $comuna) {

	require_once '../modell/madmin.php';
	try {
		$lista = new funciones_BD();
		$lista->agregarComuna($sector, $comuna);

		if ($lista) {
			return true;

		} else {
			return false;
		}
	} catch (Exception $e) {
		
	}	
}

public function geolocalizacion_delito_comuna($comuna) {
	$sql = "SELECT delito_delincuente.direccion as direccion, delincuente.fecha, delincuente.apodo,
			delincuente.apodo ,delito_delincuente.latitud, delito_delincuente.longitud, comuna.id_comuna, 
			comuna.comuna, delito_delincuente.direccion 
			FROM `delito_delincuente` 
			inner join delincuente on delito_delincuente.id_delincuente = delincuente.rut
			inner join comuna on delito_delincuente.id_comuna = comuna.id_comuna
			WHERE comuna.id_comuna = '".$comuna."' 
			order by `delincuente`.`fecha` DESC 
			LIMIT 30";

	$stmt = $this->db->connect()->query($sql);
	$datos = array();
	while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$datos[] = array_map("utf8_encode", $fila);
		// $datos[] =  $fila;
	}
	return $datos;
}

	//==================== listado de insituciones  ===========================
	public function lista_sectores() {
		$sql = "select id_sector, sector from `sector` where estado = 1 ";

		$stmt = $this->db->connect()->query($sql);
		$datos = array();
		while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
			$datos[] = array_map("utf8_encode", $fila);
			// $datos[] =  $fila;
		}
		return $datos;
	}


	//==================== listado de insituciones  ===========================
		public function lista_sectores_inst() {
			$sql = "SELECT sector.sector, institucion.institucion, COUNT(institucion.id_institucion) as total, institucion.id_institucion 
			FROM `ins_sec` 
			INNER join institucion on ins_sec.id_institucion = institucion.id_institucion 
			inner join sector on ins_sec.id_sector = sector.id_sector
			group by institucion.id_institucion";
	
			$stmt = $this->db->connect()->query($sql);
			$datos = array();
			while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
				$datos[] = array_map("utf8_encode", $fila);
				// $datos[] =  $fila;
			}
			return $datos;
		}

		public function ingresar_ins_sec($institucion, $sector) {
			require_once '../modell/madmin.php';
	
			try {
				$lista = new funciones_BD();
				$lista->ingresar_ins_sec($institucion, $sector);
	
				if ($lista) {
					return true;
				} else {
	
					return false;
				}
			} catch (Exception $e) {
				echo "<script>alert('ERROR AL INGRESAR USUARIO NIVEL 1');</script>";
			}
		}
	
	
}
?>