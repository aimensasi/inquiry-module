export default class InquiryServices extends Services {

	static index(context, { query, onSuccess, onError }){
		axios.get(route('admin.api.inquiries.index', query))
		.then((response) => {
			InquiryServices.handle(context, response, onSuccess)
		 },({ response }) => {
			InquiryServices.handle(context, response, onError);
		});
	}

	static get(context, { id, onSuccess, onError }){
		axios.get(route('admin.api.inquiries.show', id))
		.then((response) => {
			InquiryServices.handle(context, response, onSuccess)
		 },({ response }) => {
			InquiryServices.handle(context, response, onError);
		});
	}

	static edit(context, { id }){
		location.href = route('admin.inquiries.edit', { inquiry: id }).url();
	}

	static delete(context, { id, onSuccess, onError }){
		axios.get(route('admin.api.inquiries.delete', id))
		.then((response) => {
			InquiryServices.handle(context, response, onSuccess)
		 },({ response }) => {
			InquiryServices.handle(context, response, onError);
		});
	}
}
