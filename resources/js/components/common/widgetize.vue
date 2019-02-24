<template>
  <section id="" class="card box-shadow-2 icheck-checkbox">
    <div class="card-header">
		  <h4 class="card-title">{{title}}</h4>
      <div class="heading-elements">
        <ul class="list-inline mb-0">
          <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
          <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
          <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
          <li><a data-action="close"><i class="ft-x"></i></a></li>
        </ul>
      </div>
      <div class="card-content">
		    <div class="card-body" id="">
          <slot></slot>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: 'Widgetize',
  props: ['title'],
  components: {

  }
}
</script>