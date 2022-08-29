function contentFormLab(tipo) {
    //*    Bioquimica clinica
    a = `
      <h3>Bioquimica Clinica</h3>
          <div class="row">
			<input type="hidden" value="1">
              <div class="col-lg-6">
                  <div class="form-group">
                      <label>Perfil Metabolico</label>
                      <div class="input-group">
                          <input type="text" name="glucemia" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Glucemia</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="acUrico" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Ac. Urico</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="proteinasTotales" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Proteinas Totales</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="albumina" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Albumina</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Perfil Renal</label>
                      <div class="input-group">
                          <input type="text" name="creatinina" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Creatinina</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="nitrogenoUreico" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Nitrogeno Ureico</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="urea" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Urea</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Perfil Metabolico</label>
                      <div class="input-group">
                          <input type="text" name="colesterol" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Colesterol</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="trigliceridos" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">trigliceridos</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="hdlCol" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">HDL-COL</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="ldlCol" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">LDL-COL</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="vldl" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">VLDL</span>
                      </div>
                  </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                      <label>Perfil Hepatico</label>
                      <div class="input-group">
                          <input type="text" name="bTotal" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">B. total</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="bDirecta" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">B. Directa</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="bIndirecta" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">B. Indirecta</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="astGot" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">AST/GOT</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="astGpt" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">AST/GPT</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="fAlcalina" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">F. Alcalina</span>
                      </div>
                  </div>
                  <div class="form-group">
                      <label>Perfil Pancreatico</label>
                      <div class="input-group">
                          <input type="text" name="amilasa" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Amilasa</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="lipasa" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Lipasa</span>
                      </div>

                  </div>
                  <div class="form-group">
                      <label>Perfil Electrolitico</label>
                      <div class="input-group">
                          <input type="text" name="sodio" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Sodio (NA)</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="potasio" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Potasio(K)</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="cloro" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Cloro(Cl)</span>
                      </div>
                      <div class="input-group">
                          <input type="text" name="calcio" class="form-control" placeholder="--" autocomplete="off">
                          <span class="input-group-addon">Calcio(Ca)</span>
                      </div>
                  </div>
              </div>
          </div>
          <hr>
			<button class="btn btn-theme-inverse" type="submit">Registrar</button>
      `;
    //* Coagulograma
    b = `
        <h3>Coagulograma</h3><br>
            <div class="row">
			    <input type="hidden" value="1">
                <div class="col-lg-12">
                    <div class="form-group">
                          <div class="input-group">
                          <input type="text" name="tiempoCoagulacion" class="form-control" placeholder="Tiempo de coagulación" autocomplete="off" required>
                          <span class="input-group-addon">MIN</span>
                    </div>
                    <div class="input-group">
                          <input type="text" name="tiempoSangria" class="form-control" placeholder="Tiempo de sangria" autocomplete="off" required>
                          <span class="input-group-addon">MIN</span>
                    </div>
                    <div class="input-group">
                          <input type="text" name="tiempoProtrombina" class="form-control" placeholder="Tiempo de protombina" autocomplete="off" required>
                          <span class="input-group-addon">#</span>
                    </div>
                    <div class="input-group">
                          <input type="text" name="actividadProtrombina" class="form-control" placeholder="Actividad protrombinica" autocomplete="off">
                          <span class="input-group-addon">#</span>
                    </div>
                    <div class="input-group">
                          <input type="text" name="INR" class="form-control" placeholder="INR" autocomplete="off">
                          <span class="input-group-addon">#</span>
                    </div>
                </div>
            </div>
        <hr>
		<button class="btn btn-theme-inverse" type="submit">Registrar</button>
      `;
    //    *Biometria Hematica
    c = `
      <h3 align="center">Biometria Hematica</h3><br>
      <h4>Cuadro Hematico</h4><br>
          <div class="row">
              <input type="hidden" value="1">
              <div class="col-lg-12">
                  <div class="form-group">
                        <div class="input-group">
                        <input type="text" name="Glóbulos Rojos" class="form-control" placeholder="Glóbulos Rojos" autocomplete="off" required>
                        <span class="input-group-addon">millones/mm3</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Hemoglobina" class="form-control" placeholder="Hemoglobina" autocomplete="off" required>
                        <span class="input-group-addon">g/dL</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Hematocrito" class="form-control" placeholder="Hematocrito" autocomplete="off" required>
                        <span class="input-group-addon">%</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="VES" class="form-control" placeholder="VES" autocomplete="off">
                        <span class="input-group-addon">mm/hora</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Leucocitos" class="form-control" placeholder="Leucocitos" autocomplete="off">
                        <span class="input-group-addon">x/mm3</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Cayados" class="form-control" placeholder="Cayados" autocomplete="off">
                        <span class="input-group-addon">%</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Neutrofilos" class="form-control" placeholder="Neutrofilos" autocomplete="off">
                        <span class="input-group-addon">%</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Eosinófilos" class="form-control" placeholder="Eosinófilos" autocomplete="off">
                        <span class="input-group-addon">%</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Basófilos" class="form-control" placeholder="Basófilos" autocomplete="off">
                        <span class="input-group-addon">%</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Linfocitos" class="form-control" placeholder="Linfocitos" autocomplete="off">
                        <span class="input-group-addon">%</span>
                  </div>
                  <div class="input-group">
                        <input type="text" name="Monocitos" class="form-control" placeholder="Monocitos" autocomplete="off">
                        <span class="input-group-addon">%</span>
                  </div>
              </div>
          </div>
      <hr>
      <button class="btn btn-theme-inverse" type="submit">Registrar</button>
    `;
    //    *Serologia
    d = `
      <h3 align="center">Serologia</h3><br>
          <div class="row">
              <input type="hidden" value="1">
              <div class="col-lg-12">
                  <div class="form-group">
                        <div class="input-group">
                        <span class="input-group-addon">Grupo Sanguineo</span>
                        <input type="text" name="grupoSanguineo" class="form-control" placeholder="Glóbulos Rojos" autocomplete="off" required>
                  </div>
                  <div class="input-group">
                  <span class="input-group-addon">Factor Rh</span>
                        <input type="text" name="factorRha" class="form-control" placeholder="Hemoglobina" autocomplete="off" required>
                  </div>   
                  <div class="input-group">
                        <span class="input-group-addon">R.P.R.</span>
                        <input type="text" name="RPR" class="form-control" placeholder="Hematocrito" autocomplete="off" required>
                  </div>
                  <div class="input-group">
                        <span class="input-group-addon">P.C.R.</span>
                        <input type="text" name="pcr" class="form-control" placeholder="VES" autocomplete="off">
                        <span class="input-group-addon">mg/L   &lt; 12mg/L</span>
                  </div>
                  <div class="input-group">
                        <span class="input-group-addon">F. Reumatoide</span>
                        <input type="text" name="fReomatoide" class="form-control" placeholder="Leucocitos" autocomplete="off">
                        <span class="input-group-addon">UI/mL 20-30 UI/mL</span>
                  </div>
                  <div class="input-group">
                  <span class="input-group-addon">A.S.T.O.</span>
                        <input type="text" name="Cayados" class="form-control" placeholder="Cayados" autocomplete="off">
                        <span class="input-group-addon">UI/mL &lt; a 200UI/mL</span>
                  </div>
            <br>
            <h4>Antigenos Febriles (WIDAL)</h4>   
                  <div class="input-group">
                    <span class="input-group-addon">Eberth "O"</span>
                    <input type="text" name="EberthO" class="form-control" placeholder="Linfocitos" autocomplete="off">
                    <span class="input-group-addon">1/80</span>
                  </div>
                    <div class="input-group">
                    <span class="input-group-addon">Eberth "H"</span>
                    <input type="text" name="EberthH" class="form-control" placeholder="Linfocitos" autocomplete="off">
                    <span class="input-group-addon">1/40</span>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Paratifus "A"</span>
                    <input type="text" name="ParatifusA" class="form-control" placeholder="Linfocitos" autocomplete="off">
                    <span class="input-group-addon">1/40</span>
                  </div>
                  <div class="input-group">
                    <span class="input-group-addon">Paratifus "B"</span>
                    <input type="text" name="ParatifusB" class="form-control" placeholder="Linfocitos" autocomplete="off">
                    <span class="input-group-addon">1/80</span>
                  </div>
            <br>
            <h4>Prueba Rapida de VIH</h4>      

                <div class="input-group">
                <span class="input-group-addon">Muestra</span>
                        <input type="text" name="muestra" class="form-control" placeholder="Eosinófilos" autocomplete="off">
                </div>
                <div class="input-group">
                <span class="input-group-addon">Examen Solicitado</span>
                        <input type="text" name="examenSolicitado" class="form-control" placeholder="Basófilos" autocomplete="off">
                </div>
                <div class="input-group">
                <span class="input-group-addon">Resultado</span>
                        <input type="text" name="resultado" class="form-control" placeholder="Linfocitos" autocomplete="off">
                </div>
            <br>
            <h4>Prueba de embarazo (HCG) </h4>      

                <div class="input-group">
                <span class="input-group-addon">F.U.M. </span>
                        <input type="text" name="FUM" class="form-control" placeholder="" autocomplete="off">
                </div>
                <div class="input-group">
                <span class="input-group-addon">Muestra</span>
                        <input type="text" name="Muestra" class="form-control" placeholder="Muestra" autocomplete="off">
                </div>
                <div class="input-group">
                <span class="input-group-addon">Resultado</span>
                        <input type="text" name="resultado" class="form-control" placeholder="Resultado" autocomplete="off">
                </div>
              </div>
          </div>
      <hr>
      <button class="btn btn-theme-inverse" type="submit">Registrar</button>
    `;
    switch (tipo) {
        case 1:
            return a;
            break;
        case 2:
            return b;
            break;
        case 3:
            return c;
            break;
        case 4:
            return d;
            break;
        default:
            break;
    }
}

function mostrarVista(dat) {
    console.log(dat);
    switch (dat.tipo) {
        case 1:
            console.log(dat.data[5].name);
            var a1 = `
            <div class="col-lg-12" id="View_BioClin">
                <h3 align="center">-----Bioquimica Clinica-----</h3>
                <br />
                <div class="row">
                    <div class="col-lg-6">
                    <h4>Perfil Metabolico</h4>
                    <br />
                    <table
                        class="table-striped"
                        style="border-color: black"
                        width="100%"
                        border="2"
                        cellpadding="0"
                        cellspacing="2"
                    >
                        <tr>
                        <td>Glucemia</td>
                        <td width="10%">${dat.data[0].value}</td>
                        <td style="font-size: x-small" align="right">70-110 mg/dL</td>
                        </tr>
                        <tr>
                        <td>Ac urico</td>
                        <td width="10%">${dat.data[1].value}</td>
                        <td style="font-size: x-small" align="right">2.0-6.0 mg/dL</td>
                        </tr>
                        <tr>
                        <td>Proteinas totales</td>
                        <td width="10%">${dat.data[2].value}</td>
                        <td style="font-size: x-small" align="right">6.2-8.5 g/dL</td>
                        </tr>
                        <tr>
                        <td>Albumina</td>
                        <td width="10%">${dat.data[3].value}</td>
                        <td style="font-size: x-small" align="right">3.5-5.3 g/dL</td>
                        </tr>
                    </table>
                    <hr />
                    <h4>Perfil Renal</h4>
                    <br />
                    <table class="table-bordered" width="100%">
                        <tr>
                        <td>Creatinina</td>
                        <td>${dat.data[4].value}</td>
                        <td style="font-size: x-small" align="right">0.6 - 1.4 mg/dL</td>
                        </tr>
                        <tr>
                        <td>Nitrogeno ureico</td>
                        <td>${dat.data[5].value}</td>
                        <td style="font-size: x-small" align="right">7.0 - 25 mg&dL</td>
                        </tr>
                        <tr>
                        <td>Urea</td>
                        <td>${dat.data[6].value}</td>
                        <td style="font-size: x-small" align="right">15 - 45 mg/dL</td>
                        </tr>
                    </table>
                    <hr />
                    <h4>Perfil lipidico</h4>
                    <table class="table-bordered" width="100%">
                        <tr>
                        <td>Colesterol</td>
                        <td>${dat.data[7].value}</td>
                        <td style="font-size: x-small" align="right">< 200mg/dL</td>
                        </tr>
                        <tr>
                        <td>Triglicericos</td>
                        <td>${dat.data[8].value}</td>
                        <td style="font-size: x-small" align="right">30 -150 mg/dL</td>
                        </tr>
                        <tr>
                        <td>HDL-COL</td>
                        <td>${dat.data[9].value}</td>
                        <td style="font-size: x-small" align="right">30-85 mg/dL</td>
                        </tr>
                        <tr>
                        <td>LDL-COL</td>
                        <td>${dat.data[10].value}</td>
                        <td style="font-size: x-small" align="right">< 155 mg/dL</td>
                        </tr>
                        <tr>
                        <td>VLDL</td>
                        <td>${dat.data[11].value}</td>
                        <td style="font-size: x-small" align="right">< 40mg/dL</td>
                        </tr>
                    </table>
                    </div>
                    <div class="col-lg-6">
                    <h4>Perfil Metabolico</h4>
                    <br />
                    <table
                        class="table-striped"
                        style="border-color: black"
                        width="100%"
                        border="2"
                        cellpadding="0"
                        cellspacing="2"
                    >
                        <tr>
                        <td>Glucemia</td>
                        <td width="10%">${dat.data[12].value}</td>
                        <td style="font-size: x-small" align="right">70-110 mg/dL</td>
                        </tr>
                        <tr>
                        <td>Ac urico</td>
                        <td width="10%">${dat.data[13].value}</td>
                        <td style="font-size: x-small" align="right">2.0-6.0 mg/dL</td>
                        </tr>
                        <tr>
                        <td>Proteinas totales</td>
                        <td width="10%">${dat.data[14].value}</td>
                        <td style="font-size: x-small" align="right">6.2-8.5 g/dL</td>
                        </tr>
                        <tr>
                        <td>Albumina</td>
                        <td width="10%">${dat.data[15].value}</td>
                        <td style="font-size: x-small" align="right">3.5-5.3 g/dL</td>
                        </tr>
                    </table>
                    <hr />
                    <h4>Perfil Renal</h4>
                    <table class="table-bordered" width="100%">
                        <tr>
                        <td>Creatinina</td>
                        <td>${dat.data[16].value}</td>
                        <td style="font-size: x-small" align="right">0.6 - 1.4 mg/dL</td>
                        </tr>
                        <tr>
                        <td>Nitrogeno ureico</td>
                        <td>${dat.data[17].value}</td>
                        <td style="font-size: x-small" align="right">7.0 - 25 mg&dL</td>
                        </tr>
                        <tr>
                        <td>Urea</td>
                        <td>${dat.data[18].value}</td>
                        <td style="font-size: x-small" align="right">15 - 45 mg/dL</td>
                        </tr>
                    </table>
                    <hr />
                    <h4>Perfil lipidico</h4>
                    <table class="table-bordered" width="100%">
                        <tr>
                        <td>Colesterol</td>
                        <td>${dat.data[19].value}</td>
                        <td style="font-size: x-small" align="right">< 200mg/dL</td>
                        </tr>
                        <tr>
                        <td>Triglicericos</td>
                        <td>${dat.data[20].value}</td>
                        <td style="font-size: x-small" align="right">30 -150 mg/dL</td>
                        </tr>
                        <tr>
                        <td>HDL-COL</td>
                        <td>${dat.data[21].value}</td>
                        <td style="font-size: x-small" align="right">30-85 mg/dL</td>
                        </tr>
                        <tr>
                        <td>LDL-COL</td>
                        <td>${dat.data[22].value}</td>
                        <td style="font-size: x-small" align="right">< 155 mg/dL</td>
                        </tr>
                        <tr>
                        <td>VLDL</td>
                        <td>${dat.data[23].value}</td>
                        <td style="font-size: x-small" align="right">< 40mg/dL</td>
                        </tr>
                    </table>
                    </div>
                </div>
                <button type="button" class="btn btn-danger btn-sm" onclick="eraseFormLab('View_BioClin','1')"> <i class="fa fa-eraser"></i> </button>
                <h3 align="center">----- // -----</h3>
                <br />
            </div>
            `;

            break;

        case 2:
            a1 = `
            <div class="col-lg-12" id="View_Coag">
            <h3 align="center">-----Coagulograma-----</h3>
            <table class="table-striped" style="border-color: black;" width="100%" border="2" cellpadding="0" cellspacing="2">
                <tr>
                    <td>tiempo de coagulación</td>
                    <td width="">${dat.data[0].value} min</td>
                    <td style="font-size: x-small;" align="right">6 - 12 min</td>
                </tr>
                <tr>
                    <td>Tiempo de sangria</td>
                    <td width="">${dat.data[1].value} min</td>
                    <td style="font-size: x-small;" align="right">1 - 3 min</td>
                </tr>
                <tr>
                    <td>Tiempo de protombina</td>
                    <td width="">${dat.data[2].value} segundos</td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                <tr>
                    <td>Actividad protombinica</td>
                    <td width="">${dat.data[3].value}</td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                <tr>
                    <td>INR</td>
                    <td width="">${dat.data[4].value}</td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
            </table>
            <br>
            <h4>Control</h4>
            <p>
                Tiempo de protrombina => 13 seg <br>
                Actividad protrombinica => 100% <br>
                INR =>
            </p>
            <button type="button" class="btn btn-danger btn-sm" onclick="eraseFormLab('View_Coag','2')"> <i class="fa fa-eraser"></i> </button>
            <h3 align="center">----- // -----</h3><br>
        </div>
            `;
            break;

        case 3:
            a1 = `
            <div class="col-lg-12" id="View_Coag">
            <h3 align="center">-----Coagulograma-----</h3>
            <table class="table-striped" style="border-color: black;" width="100%" border="2" cellpadding="0" cellspacing="2">
                <tr>
                    <td>Globulos rojos</td>
                    <td width="">${dat.data[0].value} min</td>
                    <td style="font-size: x-small;" align="right">millones/mm3</td>
                </tr>
                <tr>
                    <td>Hemoglobina</td>
                    <td width="">${dat.data[1].value} min</td>
                    <td style="font-size: x-small;" align="right">g/dL</td>
                </tr>
                <tr>
                    <td>Hematocrito</td>
                    <td width="">${dat.data[2].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                <tr>
                    <td>VES</td>
                    <td width="">${dat.data[3].value} min</td>
                    <td style="font-size: x-small;" align="right">mm/hora</td>
                </tr>
                <tr>
                    <td>Leucocitos</td>
                    <td width="">${dat.data[4].value} min</td>
                    <td style="fondt-size: x-small;" align="right">x/mm3</td>
                </tr>
                <tr>
                    <td>Cayados</td>
                    <td width="">${dat.data[5].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                <tr>
                    <td>Neutrofilos</td>
                    <td width="">${dat.data[6].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                <tr>
                    <td>Eusinófilos</td>
                    <td width="">${dat.data[7].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                <tr>
                    <td>Basófilos</td>
                    <td width="">${dat.data[8].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                <tr>
                    <td>Linfositos</td>
                    <td width="">${dat.data[9].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                <tr>
                    <td>Monocitos</td>
                    <td width="">${dat.data[10].value} min</td>
                    <td style="font-size: x-small;" align="right">%</td>
                </tr>
                
            </table>
            <br>
            <h4>Control</h4>
            <p>
                Tiempo de protrombina => 13 seg <br>
                Actividad protrombinica => 100% <br>
                INR =>
            </p>
            <button type="button" class="btn btn-danger btn-sm" onclick="eraseFormLab('View_Coag','2')"> <i class="fa fa-eraser"></i> </button>
            <h3 align="center">----- // -----</h3><br>
        </div>
            `;
            break;

        case 4:
            // *Serologia
            a1 = `
            <div class="col-lg-12" id="View_Coag">
            <h3 align="center">-----Serologia-----</h3>
            <table class="table-striped" style="border-color: black;" width="100%" border="2" cellpadding="0" cellspacing="2">
                <tr>
                    <td>Grupo Sanguineo</td>
                    <td width="">${dat.data[0].value}</td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                <tr>
                    <td>Factor RH</td>
                    <td width="">${dat.data[1].value} </td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                <tr>
                    <td>R. P. R.</td>
                    <td width="">${dat.data[2].value} </td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                <tr>
                    <td>P. C. R.</td>
                    <td width="">${dat.data[3].value} </td>
                    <td style="font-size: x-small;" align="right">mg/L  12mg/L</td>
                </tr>
                <tr>
                    <td>F. Reumatoide</td>
                    <td width="">${dat.data[4].value} </td>
                    <td style="fondt-size: x-small;" align="right">UI/mL20-30 UI/mL</td>
                </tr>
                <tr>
                    <td>A.S.T.O.</td>
                    <td width="">${dat.data[5].value} </td>
                    <td style="font-size: x-small;" align="right">UI/mL a 200UI/mL</td>
                </tr>
                <tr>
                <h4>Antigenos Febriles (WIDAL)</h4>
                </tr>
                <tr>
                    <td>Eberth "O"</td>
                    <td width="">${dat.data[6].value}</td>
                    <td style="font-size: x-small;" align="right">1/80</td>
                </tr>
                <tr>
                    <td>Eberth "H"</td>
                    <td width="">${dat.data[7].value} </td>
                    <td style="font-size: x-small;" align="right">1/40</td>
                </tr>
                <tr>
                    <td>Paratifus "A"</td>
                    <td width="">${dat.data[8].value} </td>
                    <td style="font-size: x-small;" align="right">1/40</td>
                </tr>
                <tr>
                    <td>Pratifus "B"</td>
                    <td width="">${dat.data[9].value} </td>
                    <td style="font-size: x-small;" align="right">1/80</td>
                </tr>
                <tr>
                <h4>Prueba Rapida de VIH<h4>
                </tr>
                <tr>
                    <td>Muestra</td>
                    <td width="">${dat.data[10].value} </td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                <tr>
                    <td>Examen Solicitado</td>
                    <td width="">${dat.data[11].value} </td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                <tr>
                    <td>Resultado</td>
                    <td width="">${dat.data[12].value} </td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                <tr>
                <h4>Prueba de Embarazo<h4>
                </tr>
                <tr>
                    <td>F.U.M.</td>
                    <td width="">${dat.data[13].value} </td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                <tr>
                    <td>Muestra</td>
                    <td width="">${dat.data[14].value} </td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                <tr>
                    <td>Resultado</td>
                    <td width="">${dat.data[15].value} </td>
                    <td style="font-size: x-small;" align="right"></td>
                </tr>
                
            </table>
            <br>
            <h4>Control</h4>
            <p>
                Tiempo de protrombina => 13 seg <br>
                Actividad protrombinica => 100% <br>
                INR =>
            </p>
            <button type="button" class="btn btn-danger btn-sm" onclick="eraseFormLab('View_Coag','2')"> <i class="fa fa-eraser"></i> </button>
            <h3 align="center">----- // -----</h3><br>
        </div>
            `;

            break;
        default:
            break;
    }
    $("#sect_result_lab").append(a1);
}
