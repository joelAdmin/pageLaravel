2017_03_03_084804_create_notices_table


Schema::create('category_notices', function (Blueprint $table) {
           $table->increments('id_Cat');
           //$table->primary('id_Cat');
           $table->string('name_cat');
           $table->boolean('status_cat');
           $table->timestamps();
        });


        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id_Not');
            //$table->primary('id_Not');
            $table->integer('id_cat')->unsigned();
            $table->foreign('id_cat')->references('id_Cat')->on('category_notices');
            $table->integer('id_sco')->unsigned();
            $table->foreign('id_sco')->references('id_Sco')->on('scope_notices');
            $table->string('anteater_not')->nullable();
            $table->string('title_not');
            $table->string('subtitle_not');
            $table->string('author_not');
            $table->string('source_not')->nullable();
            $table->string('url_source_not')->nullable();
            $table->longText('inlet_not');
            $table->longText('content_not');
            $table->string('image_not');
            $table->enum('type_not', ['normal', 'interest']);
            $table->boolean('estatus_not');
            $table->timestamps(); //created_at updated_at
        });


        Schema::create('scope_notices', function (Blueprint $table) {
            $table->increments('id_Sco');
            //$table->primary('id_Sco');
            $table->string('name_sco');
            $table->boolean('status_sco');
            $table->timestamps();
        });