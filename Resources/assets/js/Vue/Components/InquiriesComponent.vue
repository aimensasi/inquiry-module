<template>
	<div class="wrapper">
		<div class="page-title">
    	<span class="page-text">
				<i class="fal fa-envelope-open-text mr-2"></i>
				Inquiries
			</span>
  	</div>
		<v-table title="Inquiries List"
			v-if="index"
			:index="index"
			:enable-edit="true"
			:enable-delete="true"
			@edit="onEdit"
			@delete="onDelete"
			:labels="labels">
			<template slot="table-header-actions">
				<button type="button" class="btn btn-primary ml-auto" @click="onExport">Export</button>
			</template>
		</v-table>
	</div>
</template>

<script>
	import InquiryServices from './../Services/InquiryServices';

	export default {
		props: {},
		data: function(){
			return {
				index: InquiryServices.index,
				labels: [
					{ field: "id", title: "ID", 'sortable': true },
					{ field: "name", title: "Name", 'sortable': true },
					{ field: "email", title: "Email Address", 'sortable': true },
					{ field: "message", title: "Message", 'filters': ['truncate'], 'sortable': false },
					{ field: "status", title: "Status", 'sortable': true },
					{ field: "resolved_at", title: "Resolved At", 'sortable': true, default: 'Still Open' },
					{ field: "sent_at", title: "Sent At", 'sortable': true },
				],
			};
		},
		mounted(){
			this.setDefaults();
		},
		methods: {
			setDefaults: function(){

			},
			onExport: function(e){

			},
			onEdit: function(id){
				InquiryServices.edit(this, { id });
			},
			onDelete: function(id){
				InquiryServices.delete(this, { id });
			},
		}
	}
</script>
